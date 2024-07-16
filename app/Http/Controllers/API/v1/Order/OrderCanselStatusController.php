<?php

namespace App\Http\Controllers\API\v1\Order;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\v1\Order\OrderResource;
use App\Models\Order;
use App\Service\OrderStatus;
use App\Service\OrderType;


class OrderCanselStatusController extends Controller
{
    public function __invoke(Order $order)
    {
        $order->order_status = OrderStatus::CANSEL;
        $order->save();

        return new OrderResource($order);
    }
}
