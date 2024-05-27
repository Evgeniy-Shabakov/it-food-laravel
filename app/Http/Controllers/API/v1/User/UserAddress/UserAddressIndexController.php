<?php

namespace App\Http\Controllers\API\v1\User\UserAddress;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\v1\Address\AddressResource;
use App\Models\User;

class UserAddressIndexController extends Controller
{
    public function __invoke(User $user)
    {
       return AddressResource::collection($user->addresses);
    }
}
