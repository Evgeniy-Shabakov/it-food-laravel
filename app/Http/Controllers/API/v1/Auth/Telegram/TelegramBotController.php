<?php

namespace App\Http\Controllers\API\v1\Auth\Telegram;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TelegramBotController extends Controller
{
   public function __invoke(Request $request)
   {
      $update = $request->all();
      $botToken = config('telegram.bot_token');

      if (isset($update['message']['text'])) {
         $chatId = $update['message']['chat']['id'];
         $text = trim($update['message']['text']);

         $responseText = match ($text) {
            '/start' => 'Привет! Я бот на Laravel',
            '/help' => 'Доступные команды: /start, /help',
            default => 'Не понимаю команду. Напишите /help',
         };

         Http::post("https://api.telegram.org/bot{$botToken}/sendMessage", [
            'chat_id' => $chatId,
            'text' => $responseText,
         ]);
      }

      return response()->noContent();
   }
}
