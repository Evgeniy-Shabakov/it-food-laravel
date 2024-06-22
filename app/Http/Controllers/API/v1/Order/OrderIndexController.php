<?php

namespace App\Http\Controllers\API\v1\Order;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\v1\Order\OrderResource;
use App\Models\Order;

class OrderIndexController extends Controller
{
    public function __invoke()
    {
        $orders = Order::all();

        return OrderResource::collection($orders);
    }
}
