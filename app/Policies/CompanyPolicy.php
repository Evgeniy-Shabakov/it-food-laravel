<?php

namespace App\Policies;

use App\Models\Company;
use App\Models\User;
use App\Service\PermissionsHelper;

class CompanyPolicy
{
    public function before(User $user, string $ability): bool|null
    {
        $allowedRoles = PermissionsHelper::PERMISSIONS['company'];

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

    public function update(User $user, Company $company): bool
    {
        return false;
    }

    public function delete(User $user, Company $company): bool
    {
        return false;
    }
}
