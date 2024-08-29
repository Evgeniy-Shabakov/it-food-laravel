<?php

namespace App\Http\Controllers\API\v1\Order;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\v1\Order\OrderResource;
use App\Models\Order;
use App\Service\OrderStatus;
use App\Service\OrderType;


class OrderPreviousStatusController extends Controller
{
    public function __invoke(Order $order)
    {
        $orderStatuses = OrderStatus::STATUSES_ORDER_DELIVERY;

        if ($order->order_type == OrderType::PICK_UP) $orderStatuses = OrderStatus::STATUSES_ORDER_PICK_UP;

        if ($order->order_type == OrderType::IN_RESTAURANT) {
            if($order->table_number) $orderStatuses = OrderStatus::STATUSES_ORDER_IN_RESTAURANT_TABLE;
            else $orderStatuses = OrderStatus::STATUSES_ORDER_IN_RESTAURANT_COUNTER;
        }

        if($order->order_status == OrderStatus::CANSEL) {
            $order->order_status = OrderStatus::CREATED;
            $order->save();
        }

//        else if($order->order_type == OrderType::DELIVERY) {
            $index = array_search($order->order_status, $orderStatuses);
            if ($index !== false && $index > 0) {
                $index--;
                $order->order_status = $orderStatuses[$index];
                $order->save();
            }
//        }

        return new OrderResource($order);
    }
}
