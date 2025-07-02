<?php

namespace App\Http\Controllers\API\v1\Auth\VK;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\v1\User\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class VKLoginController extends Controller
{
   public function __invoke(Request $request)
   {
      $data = $request->validate(['access_token' => 'required|string']);

      // POST запрос к VK OAuth API для проверки номера телефона
      $response = Http::asForm()->post('https://id.vk.com/oauth2/user_info', [
         'client_id' => config('vk-auth.app_id'),
         'access_token' => $data['access_token']
      ]);

      $vkData = $response->json();

      if ($response->failed() || isset($vkData['error'])) {
         return response([
            'message' => 'Ошибка проверки токена ВК: ' . ($vkData['error_description'] ?? 'Unknown error')
         ], Response::HTTP_UNAUTHORIZED);
      }

      if (empty($vkData['user']['phone'])) {
         return response([
            'message' => 'Номер телефона не определен'
         ], Response::HTTP_UNAUTHORIZED);
      }

      $phone = '+' . $vkData['user']['phone'];
      $user = User::firstOrCreate(['phone' => $phone], ['phone' => $phone]);

      Auth::login($user, true);
      $request->session()->regenerate();

      return response(new UserResource($user), Response::HTTP_OK);
   }
}
