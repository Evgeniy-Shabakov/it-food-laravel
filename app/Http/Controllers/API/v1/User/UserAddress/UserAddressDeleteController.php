<?php

namespace App\Http\Controllers\API\v1\User\UserAddress;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\v1\User\UserResource;
use App\Models\Address;
use App\Models\User;

class UserAddressDeleteController extends Controller
{
    public function __invoke(User $user, Address $address)
    {
        //имитирую удаление для пользователя, если есть заказы привязанные к адресу

        $addressOrders = $address->orders;
        $ordersCount = $addressOrders->count();

        if ($ordersCount == 0)
            $address->delete();
        else
            $address->update(['show_to_user' => false]);

        return new UserResource($user);
    }
}
