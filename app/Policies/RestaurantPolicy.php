<?php

namespace App\Policies;

use App\Models\Restaurant;
use App\Models\User;
use App\Service\PermissionsHelper;

class RestaurantPolicy
{
    public function before(User $user, string $ability): bool|null
    {
        $allowedRoles = PermissionsHelper::PERMISSIONS['restaurant'];

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

    public function update(User $user, Restaurant $restaurant): bool
    {
        return false;
    }

    public function delete(User $user, Restaurant $restaurant): bool
    {
        return false;
    }
}
