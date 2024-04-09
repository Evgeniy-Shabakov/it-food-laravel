<?php

namespace App\Http\Controllers\API\v1\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\v1\User\UserResource;
use App\Models\User;

class UserShowController extends Controller
{
    public function __invoke(User $user)
    {
        return new UserResource($user);
    }
}
