<?php

namespace App\Http\Controllers\API\v1\User\UserOrder;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\v1\User\UserOrder\UserOrderStoreRequest;
use App\Http\Resources\API\v1\Order\OrderResource;
use App\Models\Order;
use App\Models\User;


class UserOrderStoreController extends Controller
{
    public function __invoke(User $user, UserOrderStoreRequest $request)
    {
        $data = $request->validated();

        $order = Order::create($data);

        return new OrderResource($order);
    }
}
