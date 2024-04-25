<?php

namespace App\Http\Controllers\API\v1\Role;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\v1\Role\RoleResource;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class RoleIndexController extends Controller
{
    public function __invoke()
    {
        if (Auth::user()->employee->isSuperAdmin()) {
            $roles = Role::all();
        }
        else if (Auth::user()->employee->isDirector()) {
            $roles = Role::whereNotIn('title', [Role::SUPER_ADMIN])->get();
        }
        else {
            $roles = Role::whereNotIn('title', [Role::SUPER_ADMIN, Role::DIRECTOR])->get();
        }

        return RoleResource::collection($roles);
    }
}
