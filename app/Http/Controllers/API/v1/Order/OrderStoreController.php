<?php

namespace App\Http\Controllers\API\v1\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\v1\Order\OrderStoreRequest;
use App\Http\Resources\API\v1\Order\OrderResource;
use App\Models\Employee;
use App\Models\Order;
use App\Models\Restaurant;
use App\Service\OrderStatus;

class OrderStoreController extends Controller
{
    public function __invoke(OrderStoreRequest $request)
    {
        $data = $request->validated();

        $data['number'] = 35;
        $data['restaurant_id'] = Restaurant::first()->id;
        $data['responsible_employee_id'] = Employee::first()->id;
        $data['order_status'] = OrderStatus::CREATED;

        unset($data['products_in_order']);
        
        $order = Order::create($data);

        return new OrderResource($order);
    }
}
