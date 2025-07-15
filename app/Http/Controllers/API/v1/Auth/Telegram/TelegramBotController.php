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
         'status' => 'waiting_phone'
      ]), now()->addMinutes(15));

      // 🔥 Добавляем связь chat_id → token для быстрого поиска
      Cache::put('telegram_chat_' . $chatId, $userAuthToken, now()->addMinutes(15));

      $this->sendPhoneRequest($chatId);
   }

   protected function handleContactMessage($message)
   {
      $chatId = $message['chat']['id'];
      $phoneNumber = $message['contact']['phone_number'];

      $phoneNumber = $this->normalizePhoneNumber($phoneNumber);

      $userAuthToken = Cache::get('telegram_chat_' . $chatId); // Находим токен по chat_id

      if (!$userAuthToken) {
         $this->sendSimpleMessage($chatId, "⚠️ Сначала начните процесс входа через приложение.");
         return;
      }

      $cacheKey = 'telegram_auth_' . $userAuthToken;  // Получаем данные аутентификации
      $authData = Cache::get($cacheKey);

      if (!$authData || ($authData['status'] !== 'waiting_phone')) {
         $this->sendSimpleMessage($chatId, "⚠️ Запрос на подтверждение номера не найден.");
         return;
      }

      Cache::put($cacheKey, array_merge($authData, [      // Обновляем данные (добавляем номер и меняем статус)
         'status' => 'verified',
         'phone_number' => $phoneNumber,
      ]), now()->addMinutes(15));

      Cache::forget('telegram_chat_' . $chatId);   // Удаляем временную связь chat_id → token

      $this->sendSimpleMessage($chatId, "✅ Номер подтверждён.
      \nВернитесь в сервис {$this->serviceName}. Вход произойдет автоматически");
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

   protected function normalizePhoneNumber(string $phone): string
   {
      $phone = trim($phone);

      // Удаляем все нецифровые символы, кроме ведущего '+'
      $cleaned = preg_replace('/[^\d+]/', '', $phone);

      // Если номер не начинается с '+', добавляем его
      if (strpos($cleaned, '+') !== 0) {
         $cleaned = '+' . ltrim($cleaned, '+');
      }

      return $cleaned;
   }
}
