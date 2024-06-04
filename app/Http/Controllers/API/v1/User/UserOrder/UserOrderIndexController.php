<?php

namespace App\Http\Controllers\API\v1\User\UserOrder;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\v1\Order\OrderResource;
use App\Models\User;

class UserOrderIndexController extends Controller
{
    public function __invoke(User $user)
    {
       return OrderResource::collection($user->orders);
    }
}
