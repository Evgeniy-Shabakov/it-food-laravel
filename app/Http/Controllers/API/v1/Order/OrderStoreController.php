<?php

namespace App\Http\Controllers\API\v1\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\v1\Order\OrderStoreRequest;
use App\Http\Resources\API\v1\Order\OrderResource;
use App\Models\City;
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
            $data['responsible_employee_id'] = Employee::first()->id;
            $data['order_status'] = OrderStatus::CREATED;

            if ($data['restaurant_id'] == null) {
                $city = City::find($data['city_id']);
                $data['restaurant_id'] = $city->restaurants()->first()->id;
            }

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
