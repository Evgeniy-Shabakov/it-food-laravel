<?php

namespace App\Http\Controllers\API\v1\User\UserAddress;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\User;

class UserAddressDeleteController extends Controller
{
    public function __invoke(User $user, Address $address)
    {
        $address->delete();

        return 'OK';
    }
}
