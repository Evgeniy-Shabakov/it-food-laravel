<?php

namespace App\Http\Controllers\API\v1\Auth\Telegram;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class TelegramAuthCheckController extends Controller
{
   public function __invoke(Request $request, string $token)
   {
      $authData = Cache::get('telegram_auth_' . $token);

      if (!$authData) return response()->json(['status' => 'invalid'], 404);

      return response()->json([
         'status' => $authData['status'],
         'phone_number' => $authData['phone_number'] ?? null,
      ]);
   }
}
