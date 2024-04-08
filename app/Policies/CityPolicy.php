<?php

namespace App\Policies;

use App\Models\City;
use App\Models\Role;
use App\Models\User;

class CityPolicy
{
    public function before(User $user, string $ability): bool|null
    {
        $allowedRoles = [Role::SUPER_ADMIN, Role::DIRECTOR, Role::ADMINISTRATOR];

        foreach ($user->roles->pluck('title')->all() as $role) {
            if(in_array($role, $allowedRoles))
                return true;
        }

        return null;
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, City $city): bool
    {
        return false;
    }

    public function delete(User $user, City $city): bool
    {
        return false;
    }
}