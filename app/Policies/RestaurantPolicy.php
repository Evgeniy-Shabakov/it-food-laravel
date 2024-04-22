<?php

namespace App\Policies;

use App\Models\Restaurant;
use App\Models\User;
use App\Service\Permissions;

class RestaurantPolicy
{
    public function before(User $user, string $ability): bool|null
    {
        if($user->employee->hasPermission(Permissions::RESTAURANT_ALL_ACTIONS))
            return true;

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
