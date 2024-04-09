<?php

namespace App\Http\Controllers\API\v1\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\v1\User\UserStoreRequest;
use App\Http\Resources\API\v1\User\UserResource;
use App\Models\User;


class UserStoreController extends Controller
{
    public function __invoke(UserStoreRequest $request)
    {
        $data = $request->validated();

        $user = User::create($data);

        return new UserResource($user);
    }
}
