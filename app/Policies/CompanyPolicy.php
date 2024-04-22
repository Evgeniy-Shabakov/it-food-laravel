<?php

namespace App\Policies;

use App\Models\Company;
use App\Models\User;
use App\Service\Permissions;

class CompanyPolicy
{
    public function before(User $user, string $ability): bool|null
    {
        if($user->employee->hasPermission(Permissions::COMPANY_ALL_ACTIONS))
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
