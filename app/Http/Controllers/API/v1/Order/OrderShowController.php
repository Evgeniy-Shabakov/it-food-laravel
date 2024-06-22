<?php

namespace App\Http\Controllers\API\v1\Order;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\v1\Order\OrderResource;
use App\Models\Order;
use App\Models\User;

class OrderShowController extends Controller
{
    public function __invoke(Order $order)
    {
        return new OrderResource($order);
    }
}
