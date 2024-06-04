<?php

namespace App\Http\Controllers\API\v1\User\UserOrder;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\v1\Order\OrderResource;
use App\Models\Order;
use App\Models\User;

class UserOrderShowController extends Controller
{
    public function __invoke(User $user, Order $order)
    {
        return new OrderResource($order);
    }
}
