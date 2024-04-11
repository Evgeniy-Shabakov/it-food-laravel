<?php

namespace App\Http\Controllers\API\v1\Role;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\v1\Role\RoleResource;
use App\Models\Role;

class RoleIndexController extends Controller
{
    public function __invoke()
    {
        $roles = Role::all();

        return RoleResource::collection($roles);
    }
}
