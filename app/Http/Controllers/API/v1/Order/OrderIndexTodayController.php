<?php

namespace App\Http\Controllers\API\v1\Order;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\v1\Order\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OrderIndexTodayController extends Controller
{
    public function __invoke(Request $request)
    {
        $timezone = $request->query('timezone', 'UTC'); // Получаем часовой пояс из запроса, по умолчанию 'UTC'

        $startOfDay = Carbon::now($timezone)->startOfDay()->setTimezone('UTC');
        $endOfDay = Carbon::now($timezone)->endOfDay()->setTimezone('UTC');

        $orders = Order::whereBetween('created_at', [$startOfDay, $endOfDay])->get();

        return OrderResource::collection($orders);
    }
}
