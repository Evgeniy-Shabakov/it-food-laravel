<?php

namespace App\Http\Controllers\API\v1\Auth\Telegram;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;

class TelegramAuthTokenGenerateController extends Controller
{
   public function __invoke(Request $request)
   {
      $token = Str::random(40);

      Cache::put('telegram_auth_' . $token, ['status' => 'pending'], now()->addMinutes(15));

      $botUsername = config('telegram.bot_username');
      $botAuthUrl = "https://t.me/{$botUsername}?start={$token}";

      return response()->json([
         'tg_bot_token' => $token,
         'tg_bot_auth_url' => $botAuthUrl,
         'tg_bot_token_expires_at' => now()->addMinutes(15)->toDateTimeString()
      ]);
   }
}
