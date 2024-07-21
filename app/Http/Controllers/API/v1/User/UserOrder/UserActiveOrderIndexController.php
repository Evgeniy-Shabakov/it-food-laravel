<?php

namespace App\Http\Controllers\API\v1\User\UserOrder;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\v1\Order\OrderResource;
use App\Models\User;
use App\Service\OrderStatus;

class UserActiveOrderIndexController extends Controller
{
    public function __invoke(User $user)
    {
        $orders = $user->orders()
            ->whereNotIn('order_status', [OrderStatus::COMPLETED, OrderStatus::CANSEL])->get();
        return OrderResource::collection($orders);
    }
}
