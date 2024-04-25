<?php

namespace App\Policies;

use App\Models\Employee;
use App\Models\User;
use App\Service\Permissions;

class EmployeePolicy
{
    public function before(User $user, string $ability): bool|null
    {
        if($user->employee->isSuperAdmin())
            return true;

        return null;
    }

    public function viewAll(User $user): bool
    {
        return $user->employee->hasPermission(Permissions::EMPLOYEE_ALL_ACTIONS);
    }

    public function viewOne(User $user, Employee $employee): bool
    {
        if($employee->isSuperAdmin()) return false;

        if ($employee->isDirector() && $user->employee->isDirector() == false) return false;

        return $user->employee->hasPermission(Permissions::EMPLOYEE_ALL_ACTIONS);
    }

    public function create(User $user): bool
    {
        return $user->employee->hasPermission(Permissions::EMPLOYEE_ALL_ACTIONS);
    }

    public function update(User $user, Employee $employee): bool
    {
        if($employee->isSuperAdmin()) return false;

        if ($employee->isDirector() && $user->employee->isDirector() == false) return false;

        return $user->employee->hasPermission(Permissions::EMPLOYEE_ALL_ACTIONS);
    }

    public function delete(User $user, Employee $employee): bool
    {
        if($employee->isSuperAdmin()) return false;

        if ($employee->isDirector()) return false;

        return $user->employee->hasPermission(Permissions::EMPLOYEE_ALL_ACTIONS);
    }
}
