<?php

namespace App\Http\Controllers\API\v1\Auth\Telegram;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class TelegramBotController extends Controller
{
   protected string $botToken;
   protected string $serviceName;

   public function __construct()
   {
      $this->botToken = config('telegram.bot_token'); // Конфиг всегда в памяти
      $this->serviceName = cache()->remember('company_brand', 3600, function () {
         return Company::first()->brand_title; // Кешируем на 1 час
      });
   }

   public function __invoke(Request $request)
   {

      $update = $request->all();

      if (isset($update['message']['text'])) {
         $this->handleTextMessage($update['message']);
      }

      if (isset($update['message']['contact'])) {        // Обработка полученного контакта
         $this->handleContactMessage($update['message']);
      }

      return response()->noContent();
   }

   protected function handleTextMessage($message)
   {
      $chatId = $message['chat']['id'];
      $text = trim($message['text']);

      if (str_starts_with($text, '/start')) {
         $parts = explode(' ', $text);
         $userAuthtoken = $parts[1] ?? null;

         if ($userAuthtoken) {
            $cacheKey = 'telegram_auth_' . $userAuthtoken; // Проверяем токен в кеше
            $data = Cache::get($cacheKey);

            if ($data) {          // Токен валиден - предлагаем подтвердить номер
               Cache::put($cacheKey, array_merge($data, [
                  'telegram_chat_id' => $chatId,
                  'status' => 'waiting_phone'
               ]), now()->addMinutes(15));

               $this->sendPhoneRequest($chatId);
            } else {
               $responseText = "⚠️ Ссылка недействительна или устарела. Обновите ссылку в приложении.";
               $this->sendSimpleMessage($chatId, $responseText);
            }
         } else {           // Команда /start без токена
            $responseText = "Для входа используйте ссылку из приложения {$this->serviceName}";
            $this->sendSimpleMessage($chatId, $responseText);
         }
      } elseif ($text === '/help') {
         $responseText = 'Доступные команды: /start, /help';
         $this->sendSimpleMessage($chatId, $responseText);
      } else {
         $responseText = "Не понимаю команду: ' {$text} '. Напишите /help";
         $this->sendSimpleMessage($chatId, $responseText);
      }
   }

   protected function handleContactMessage($message)
   {
      $chatId = $message['chat']['id'];
      $phoneNumber = $message['contact']['phone_number'];

      $responseText = "Спасибо! Ваш номер телефона: {$phoneNumber}";
      $this->sendSimpleMessage($chatId, $responseText);
   }

   protected function sendSimpleMessage($chatID, $text)
   {
      Http::post("https://api.telegram.org/bot{$this->botToken}/sendMessage", [
         'chat_id' => $chatID,
         'text' => $text
      ]);
   }

   protected function sendPhoneRequest($chatID)
   {
      Http::post("https://api.telegram.org/bot{$this->botToken}/sendMessage", [
         'chat_id' => $chatID,
         'text' => "Для входа в сервис {$this->serviceName} необходимо подтвердить номер телефона",
         'reply_markup' => json_encode([
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
         ])
      ]);
   }
}
