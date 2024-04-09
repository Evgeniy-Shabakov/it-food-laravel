<?php

namespace App\Http\Controllers\API\v1\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\v1\User\UserUpdateRequest;
use App\Http\Resources\API\v1\User\UserResource;
use App\Models\User;

class UserUpdateController extends Controller
{
    public function __invoke(UserUpdateRequest $request, User $user)
    {
        $data = $request->validated();

        $user->update($data);

        return new UserResource($user);
    }
}
