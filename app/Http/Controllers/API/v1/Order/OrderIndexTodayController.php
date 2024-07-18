<?php

namespace App\Http\Controllers\API\v1\Order;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\v1\Order\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OrderIndexTodayController extends Controller
{
    public function __invoke(Request $request, $restaurantID = null)
    {
        $timezone = $request->query('timezone', 'UTC'); // Получаем часовой пояс из запроса, по умолчанию 'UTC'

        $startOfDay = Carbon::now($timezone)->startOfDay()->setTimezone('UTC');

        // до 3-00 будут также отображаться заказы оформленные после 21-00 вчерашнего дня
        if (Carbon::now($timezone)->hour < 3) {
            $startOfPreviousDay = $startOfDay->copy()->subDay()->addHours(21);
            $orders = Order::where('created_at', '>=', $startOfPreviousDay)->get();
        } else {
            $orders = Order::where('created_at', '>=', $startOfDay)->get();
        }

        // Фильтруем заказы по ресторану, если параметр передан
        if ($restaurantID) {
            $orders = $orders->where('restaurant_id', $restaurantID);
        }

        return OrderResource::collection($orders);
    }
}
