<?php

namespace App\Policies;

use App\Models\Employee;
use App\Models\Role;
use App\Models\User;
use App\Service\Permissions;

class EmployeePolicy
{
    public function viewAll(User $user): bool
    {
        return $user->employee->hasPermission(Permissions::EMPLOYEE_SIMPLE_USER_ALL_ACTIONS);
    }

    public function viewOne(User $user, Employee $employee): bool
    {
        if ($employee->isSuperAdmin())
            return $user->employee->hasPermission(Permissions::EMPLOYEE_SUPER_ADMIN_VIEW);

        if ($employee->isDirector())
            return $user->employee->hasPermission(Permissions::EMPLOYEE_DIRECTOR_VIEW);

        if ($employee->isAdministrator())
            return $user->employee->hasPermission(Permissions::EMPLOYEE_ADMINISTRATOR_VIEW);

        return $user->employee->hasPermission(Permissions::EMPLOYEE_SIMPLE_USER_ALL_ACTIONS);
    }

    public function create(User $user): bool
    {
        $data = request()->all();
        $roleSuperAdminID = Role::where('title', Role::SUPER_ADMIN)->first()->id;
        $roleDirectorID = Role::where('title', Role::DIRECTOR)->first()->id;
        $roleAdministratorID = Role::where('title', Role::ADMINISTRATOR)->first()->id;

        if (in_array($roleSuperAdminID, $data['role_ids']))
            return $user->employee->hasPermission(Permissions::EMPLOYEE_SUPER_ADMIN_CREATE);

        if (in_array($roleDirectorID, $data['role_ids']))
            return $user->employee->hasPermission(Permissions::EMPLOYEE_DIRECTOR_CREATE);

        if (in_array($roleAdministratorID, $data['role_ids']))
            return $user->employee->hasPermission(Permissions::EMPLOYEE_ADMINISTRATOR_CREATE);

        return $user->employee->hasPermission(Permissions::EMPLOYEE_SIMPLE_USER_ALL_ACTIONS);
    }

    public function update(User $user, Employee $employee): bool
    {
        $data = request()->all();
        $roleSuperAdminID = Role::where('title', Role::SUPER_ADMIN)->first()->id;
        $roleDirectorID = Role::where('title', Role::DIRECTOR)->first()->id;
        $roleAdministratorID = Role::where('title', Role::ADMINISTRATOR)->first()->id;

        if ($employee->isSuperAdmin() || in_array($roleSuperAdminID, $data['role_ids']))
            if ($employee->isSuperAdmin())
                return $user->employee->hasPermission(Permissions::EMPLOYEE_SUPER_ADMIN_UPDATE);
            else return false;

        if ($employee->isDirector() || in_array($roleDirectorID, $data['role_ids']))
            if ($user->employee->isDirector()) {
                if ($employee->isDirector() == false || in_array($roleDirectorID, $data['role_ids']) == false)
                    return false;
            } else return $user->employee->hasPermission(Permissions::EMPLOYEE_DIRECTOR_UPDATE);

        if ($employee->isAdministrator() || in_array($roleAdministratorID, $data['role_ids']))
            return $user->employee->hasPermission(Permissions::EMPLOYEE_ADMINISTRATOR_UPDATE);

        return $user->employee->hasPermission(Permissions::EMPLOYEE_SIMPLE_USER_ALL_ACTIONS);
    }

    public function delete(User $user, Employee $employee): bool
    {
        if ($employee->isSuperAdmin())
            return $user->employee->hasPermission(Permissions::EMPLOYEE_SUPER_ADMIN_DELETE);

        if ($employee->isDirector())
            return $user->employee->hasPermission(Permissions::EMPLOYEE_DIRECTOR_DELETE);

        if ($employee->isAdministrator())
            return $user->employee->hasPermission(Permissions::EMPLOYEE_ADMINISTRATOR_DELETE);

        return $user->employee->hasPermission(Permissions::EMPLOYEE_SIMPLE_USER_ALL_ACTIONS);
    }
}
