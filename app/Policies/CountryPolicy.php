<?php

namespace App\Policies;

use App\Models\Country;
use App\Models\User;
use App\Service\Permissions;

class CountryPolicy
{
    public function before(User $user, string $ability): bool|null
    {
        if($user->employee->hasPermission(Permissions::COUNTRY_ALL_ACTIONS))
            return true;

        return null;
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, Country $country): bool
    {
        return false;
    }

    public function delete(User $user, Country $country): bool
    {
        return false;
    }
}
