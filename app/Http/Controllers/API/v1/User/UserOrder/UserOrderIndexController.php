<?php

namespace App\Http\Controllers\API\v1\User\UserOrder;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\v1\Order\OrderResource;
use App\Models\User;
use App\Service\OrderStatus;

class UserOrderIndexController extends Controller
{
    public function __invoke(User $user)
    {
        $orders = $user->orders()->latest()->limit(50)->get();
        
        return OrderResource::collection($orders);
    }
}
