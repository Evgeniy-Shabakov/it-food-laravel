<?php

namespace App\Http\Controllers\API\v1\DaData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DaDataController extends Controller
{
   public function __invoke(Request $request)
   {
      $dadataApiUrl = env('DADATA_ADDRESS_API_URL');
      $dadataApiKey = env('DADATA_API_KEY');

      // Проверка наличия обязательных переменных окружения
      if (!$dadataApiUrl || !$dadataApiKey) {
         return response()->json([
            'error' => 'Server configuration error',
            'message' => 'Dadata API credentials are not configured'
         ], 500);
      }

      $request->validate([
         'query' => 'required|string',
      ]);

      // Отправляем запрос к DaData
      $response = Http::withHeaders([
         'Content-Type' => 'application/json',
         'Accept' => 'application/json',
         'Authorization' => 'Token ' . $dadataApiKey,
      ])->post($dadataApiUrl, $request->all());

      return $response->json();
   }
}
