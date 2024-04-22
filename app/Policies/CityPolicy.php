<?php

namespace App\Policies;

use App\Models\City;
use App\Models\User;
use App\Service\Permissions;

class CityPolicy
{
    public function before(User $user, string $ability): bool|null
    {
        if($user->employee->hasPermission(Permissions::CITY_ALL_ACTIONS))
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
