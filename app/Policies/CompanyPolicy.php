<?php

namespace App\Policies;

use App\Models\Company;
use App\Models\User;
use App\Service\PermissionsHelper;
use App\Service\PolicyHelper;

class CompanyPolicy
{
    public function before(User $user, string $ability): bool|null
    {
        if(PolicyHelper::checkUserOnRoles($user, PermissionsHelper::PERMISSIONS['company']))
            return true;

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
