<?php

namespace App\Http\Controllers\API\v1\Auth\Telegram;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class TelegramBotController extends Controller
{
   public function __invoke(Request $request)
   {
      $update = $request->all();
      $botToken = config('telegram.bot_token');
      $serviceName = Company::first()->brand_title;

      if (isset($update['message']['text'])) {
         $chatId = $update['message']['chat']['id'];
         $text = trim($update['message']['text']);

         if (str_starts_with($text, '/start')) {
            $parts = explode(' ', $text);
            $userAuthtoken = $parts[1] ?? null;

            if ($userAuthtoken) {
               // Проверяем токен в кеше
               $cacheKey = 'telegram_auth_' . $userAuthtoken;
               $data = Cache::get($cacheKey);

               if ($data) {
                  // Токен валиден - предлагаем подтвердить номер
                  Cache::put($cacheKey, array_merge($data, [
                     'telegram_chat_id' => $chatId,
                     'status' => 'waiting_phone'
                  ]), now()->addMinutes(15));

                  $responseText = "Для входа в сервис {$serviceName} подтвердите номер телефона";
                  $replyMarkup = [
                     'keyboard' => [
                        [
                           [
                              'text' => '✅ ПОДТВЕРДИТЬ НОМЕР ТЕЛЕФОНА',
                              'request_contact' => true
                           ]
                        ]
                     ],
                     'resize_keyboard' => true,
                     'one_time_keyboard' => true
                  ];
               } else {
                  $responseText = "⚠️ Ссылка недействительна или устарела. Обновите ссылку в приложении.";
                  $replyMarkup = null;
               }
            } else {
               // Команда /start без токена
               $responseText = "Для входа используйте ссылку из приложения {$serviceName}";
               $replyMarkup = null;
            }

            Http::post("https://api.telegram.org/bot{$botToken}/sendMessage", [
               'chat_id' => $chatId,
               'text' => $responseText,
               'reply_markup' => $replyMarkup ? json_encode($replyMarkup) : null
            ]);

            // Отправляем сообщение с кнопкой для отправки номера телефона
            // $response = Http::post("https://api.telegram.org/bot{$botToken}/sendMessage", [
            //    'chat_id' => $chatId,
            //    'text' => "Для входа в сервис {$serviceName} необходимо подтвердить номер телефона",
            //    'reply_markup' => json_encode([
            //       'keyboard' => [
            //          [
            //             [
            //                'text' => '✅ ПОДТВЕРДИТЬ НОМЕР ТЕЛЕФОНА',
            //                'request_contact' => true
            //             ]
            //          ]
            //       ],
            //       'resize_keyboard' => true,
            //       'one_time_keyboard' => true
            //    ])
            // ]);
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
