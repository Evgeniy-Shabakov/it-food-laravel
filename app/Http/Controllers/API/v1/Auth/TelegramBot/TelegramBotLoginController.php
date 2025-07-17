<?php

namespace App\Http\Controllers\API\v1\Auth\TelegramBot;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\API\v1\User\UserResource;
use Illuminate\Http\Response;

class TelegramBotLoginController extends Controller
{
   public function __invoke(Request $request)
   {
      $request->validate([
         'access_token' => 'required|string|size:40'
      ]);

      $cacheKey = 'telegram_auth_' . $request->access_token;
      $authData = Cache::get($cacheKey);

      if (!$authData || $authData['status'] !== 'verified') {
         return response()->json(['error' => 'Invalid or expired token'], 401);
      }

      $phone = $authData['phone_number'];
      Cache::forget($cacheKey);

      $frontendUrl = parse_url(config('domain.frontend_url_client'), PHP_URL_HOST);
      $frontendPort = parse_url(config('domain.frontend_url_client'), PHP_URL_PORT);
      $clientDomain = $frontendUrl . ($frontendPort ? ':' . $frontendPort : '');

      $origin = parse_url($request->headers->get('origin'), PHP_URL_HOST);
      $port = parse_url($request->headers->get('origin'), PHP_URL_PORT); // для локальной разработки
      $originWithPort = $origin . ($port ? ':' . $port : ''); // для локальной разработки

      if ($originWithPort === $clientDomain) {
         $user = User::firstOrCreate(['phone' => $phone], ['phone' => $phone]);
      } else {
         $user = User::where('phone', $phone)->first();

         if (!$user || !$user->employee || !$user->employee->hasAdminPanelAccess()) {
            return response([
               'message' => 'Доступ разрешен только сотрудникам'
            ], 403);
         }
      }

      Auth::login($user, true);
      $request->session()->regenerate();

      return response(new UserResource($user), Response::HTTP_OK);
   }
}
