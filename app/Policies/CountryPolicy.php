<?php

namespace App\Policies;

use App\Models\Country;
use App\Models\User;
use App\Service\PermissionsHelper;
use App\Service\PolicyHelper;

class CountryPolicy
{
    public function before(User $user, string $ability): bool|null
    {
        if(PolicyHelper::checkUserOnRoles($user, PermissionsHelper::PERMISSIONS['country']))
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
