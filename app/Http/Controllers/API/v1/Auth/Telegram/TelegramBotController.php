<?php

namespace App\Http\Controllers\API\v1\Auth\Telegram;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

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

      if (isset($update['message']['contact'])) {
         $this->handleContactMessage($update['message']);
      }

      return response()->noContent();
   }

   protected function handleTextMessage($message)
   {
      $chatId = $message['chat']['id'];
      $text = trim($message['text']);

      switch (true) {
         case str_starts_with($text, '/start'):
            $this->handleStartCommand($chatId, $text);
            break;

         case $text === '/help':
            $this->sendSimpleMessage($chatId, 'Доступные команды: /start, /help');
            break;

         default:
            $this->sendSimpleMessage($chatId, "Не понимаю команду: '{$text}'. Напишите /help");
      }
   }

   protected function handleContactMessage($message)
   {
      $chatId = $message['chat']['id'];
      $phoneNumber = $message['contact']['phone_number'];

      $responseText = "Спасибо! Ваш номер телефона: {$phoneNumber}";
      $this->sendSimpleMessage($chatId, $responseText);
   }

   protected function handleStartCommand(int $chatId, string $text)
   {
      $parts = explode(' ', $text);
      $userAuthToken = $parts[1] ?? null;

      if (!$userAuthToken) {
         $this->sendSimpleMessage($chatId, "Для входа используйте ссылку из приложения {$this->serviceName}");
         return;
      }

      $cacheKey = 'telegram_auth_' . $userAuthToken;
      $data = Cache::get($cacheKey);

      if (!$data) {
         $this->sendSimpleMessage($chatId, "⚠️ Ссылка недействительна или устарела. Обновите ссылку в приложении.");
         return;
      }

      Cache::put($cacheKey, array_merge($data, [ // Токен валиден - обновляем данные
         'telegram_chat_id' => $chatId,
         'status' => 'waiting_phone'
      ]), now()->addMinutes(15));

      $this->sendPhoneRequest($chatId);
   }

   protected function sendSimpleMessage(int $chatId, string $text)
   {
      try {
         Http::post("https://api.telegram.org/bot{$this->botToken}/sendMessage", [
            'chat_id' => $chatId,
            'text' => $text
         ]);
      } catch (\Exception $e) {
         Log::error("Telegram API error: " . $e->getMessage());
      }
   }

   protected function sendPhoneRequest($chatID)
   {
      try {
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
      } catch (\Exception $e) {
         Log::error("Telegram API error: " . $e->getMessage());
      }
   }
}
