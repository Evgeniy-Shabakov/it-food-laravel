<?php

namespace App\Policies;

use App\Models\Country;
use App\Models\User;
use App\Service\PermissionsHelper;

class CountryPolicy
{
    public function before(User $user, string $ability): bool|null
    {
        $allowedRoles = PermissionsHelper::PERMISSIONS['country'];

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

    public function update(User $user, Country $country): bool
    {
        return false;
    }

    public function delete(User $user, Country $country): bool
    {
        return false;
    }
}
