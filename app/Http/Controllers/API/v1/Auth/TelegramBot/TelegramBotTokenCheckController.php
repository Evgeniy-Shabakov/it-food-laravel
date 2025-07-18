<?php

namespace App\Http\Controllers\API\v1\Auth\TelegramBot;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class TelegramBotTokenCheckController extends Controller
{
   public function __invoke(Request $request, string $token)
   {
      $authData = Cache::get('telegram_auth_' . $token);

      if (!$authData) return response()->json(
         [
            'message' => 'Ссылка на телеграм устарела, обновите страницу '
         ],
         403 // Forbidden - доступ запрещен
      );

      return response()->json([
         'status' => $authData['status'],
         'phone_number' => $authData['phone_number'] ?? null,
      ]);
   }
}
