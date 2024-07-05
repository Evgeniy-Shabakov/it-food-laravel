<?php

namespace App\Http\Controllers\API\v1\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\v1\Order\OrderStoreRequest;
use App\Http\Resources\API\v1\Order\OrderResource;
use App\Models\Employee;
use App\Models\Order;
use App\Models\Restaurant;
use App\Service\OrderStatus;
use Illuminate\Support\Facades\DB;

class OrderStoreController extends Controller
{
    public function __invoke(OrderStoreRequest $request)
    {
        $data = $request->validated();

        try {
            DB::beginTransaction();

            $data['number'] = rand(11, 999);
            $data['restaurant_id'] = Restaurant::first()->id;
            $data['responsible_employee_id'] = Employee::first()->id;
            $data['order_status'] = OrderStatus::CREATED;

            $products_in_order = $data['products_in_order'];
            unset($data['products_in_order']);

            $order = Order::create($data);

            foreach ($products_in_order as $product) {
                $order->products()->attach($product['id'], [
                    'quantity' => $product['countInCart'],
                    'price' => $product['price_default']
                ]);
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }

        return new OrderResource($order);
    }
}
