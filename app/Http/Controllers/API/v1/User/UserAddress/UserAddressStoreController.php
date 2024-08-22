<?php

namespace App\Http\Controllers\API\v1\User\UserAddress;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\v1\User\UserAddress\UserAddressStoreRequest;
use App\Http\Resources\API\v1\Address\AddressResource;
use App\Http\Resources\API\v1\User\UserResource;
use App\Models\Address;
use App\Models\User;


class UserAddressStoreController extends Controller
{
    public function __invoke(User $user, UserAddressStoreRequest $request)
    {
        $data = $request->validated();

        $data['show_to_user'] = true;

        $address = Address::create($data);

        return new AddressResource($address);
    }
}
