<?php

namespace App\Http\Controllers\API\v1\Order;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\v1\Order\OrderResource;
use App\Models\Order;
use App\Service\OrderStatus;
use App\Service\OrderType;


class OrderNextStatusController extends Controller
{
    public function __invoke(Order $order)
    {
        $orderStatuses = OrderStatus::STATUSES_ORDER_DELIVERY;
        if ($order->order_type == OrderType::PICK_UP) $orderStatuses = OrderStatus::STATUSES_ORDER_PICK_UP;

        $index = array_search($order->order_status, $orderStatuses);
        if ($index !== false && $index < count($orderStatuses) - 1) {
            $index++;
            $order->order_status = $orderStatuses[$index];
            $order->save();
        }

        return new OrderResource($order);
    }
}
