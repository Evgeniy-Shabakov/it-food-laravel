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
      $serviceName = 'Demopizza';

      if (isset($update['message']['text'])) {
         $chatId = $update['message']['chat']['id'];
         $text = trim($update['message']['text']);

         if ($text === '/start' || $text === '/start start') {
            // Отправляем сообщение с кнопкой для отправки номера телефона
            $response = Http::post("https://api.telegram.org/bot{$botToken}/sendMessage", [
               'chat_id' => $chatId,
               'text' => "Для входа в сервис {$serviceName} необходимо подтвердить номер телефона",
               'reply_markup' => json_encode([
                  'keyboard' => [
                     [
                        [
                           'text' => '\n ✅ Подтвердить мой номер телефона \n',
                           'request_contact' => true
                        ]
                     ]
                  ],
                  'resize_keyboard' => true,
                  'one_time_keyboard' => true
               ])
            ]);
         } elseif ($text === '/help') {
            $responseText = 'Доступные команды: /start, /help';
            Http::post("https://api.telegram.org/bot{$botToken}/sendMessage", [
               'chat_id' => $chatId,
               'text' => $responseText,
            ]);
         } else {
            $responseText = "Не понимаю команду: ' {$text} '. Напишите /help";
            Http::post("https://api.telegram.org/bot{$botToken}/sendMessage", [
               'chat_id' => $chatId,
               'text' => $responseText,
            ]);
         }
      }

      // Обработка полученного контакта
      if (isset($update['message']['contact'])) {
         $chatId = $update['message']['chat']['id'];
         $phoneNumber = $update['message']['contact']['phone_number'];

         // Здесь вы можете сохранить номер телефона в базу данных
         // или выполнить другие действия

         Http::post("https://api.telegram.org/bot{$botToken}/sendMessage", [
            'chat_id' => $chatId,
            'text' => "Спасибо! Ваш номер телефона: {$phoneNumber}",
         ]);
      }

      return response()->noContent();
   }
}
