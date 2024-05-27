<?php

namespace App\Http\Controllers\API\v1\User\UserAddress;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\v1\User\UserAddress\UserAddressUpdateRequest;
use App\Http\Requests\API\v1\User\UserUpdateRequest;
use App\Http\Resources\API\v1\Address\AddressResource;
use App\Http\Resources\API\v1\User\UserResource;
use App\Models\Address;
use App\Models\User;

class UserAddressUpdateController extends Controller
{
    public function __invoke(UserAddressUpdateRequest $request, User $user, Address $address)
    {
        $data = $request->validated();

        $address->update($data);

        return new AddressResource($address);
    }
}
