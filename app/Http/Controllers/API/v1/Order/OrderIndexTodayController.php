<?php

namespace App\Http\Controllers\API\v1\Order;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\v1\Order\OrderResource;
use App\Models\Order;

class OrderIndexTodayController extends Controller
{
    public function __invoke()
    {
        $today = now()->startOfDay();
        $orders = Order::whereDate('created_at', $today)->get();

        return OrderResource::collection($orders);
    }
}
