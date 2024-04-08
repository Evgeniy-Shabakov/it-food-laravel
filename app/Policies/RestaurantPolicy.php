<?php

namespace App\Policies;

use App\Models\Restaurant;
use App\Models\User;
use App\Service\PermissionsHelper;
use App\Service\PolicyHelper;

class RestaurantPolicy
{
    public function before(User $user, string $ability): bool|null
    {
        if(PolicyHelper::checkUserOnRoles($user, PermissionsHelper::PERMISSIONS['restaurant']))
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
