<?php

namespace App\Policies;

use App\Models\City;
use App\Models\User;
use App\Service\PermissionsHelper;
use App\Service\PolicyHelper;

class CityPolicy
{
    public function before(User $user, string $ability): bool|null
    {
        if(PolicyHelper::checkUserOnRoles($user, PermissionsHelper::PERMISSIONS['city']))
            return true;

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
