<?php

namespace App\Policies;

use App\Models\Employee;
use App\Models\User;
use App\Service\Permissions;

class EmployeePolicy
{
    public function before(User $user, string $ability): bool|null
    {
        if ($user->employee->isSuperAdmin()  && $ability !== 'delete')
            return true;

        return null;
    }

    public function viewAll(User $user): bool
    {
        return $user->employee->hasPermission(Permissions::EMPLOYEE_ALL_ACTIONS);
    }

    public function viewOne(User $user, Employee $employee): bool
    {
        if ($employee->isSuperAdmin()) return false;

        if ($employee->isDirector() && $user->employee->isDirector() == false) return false;

        return $user->employee->hasPermission(Permissions::EMPLOYEE_ALL_ACTIONS);
    }

    public function create(User $user): bool
    {
        return $user->employee->hasPermission(Permissions::EMPLOYEE_ALL_ACTIONS);
    }

    public function update(User $user, Employee $employee): bool
    {
        if ($employee->isSuperAdmin()) return false;

        if ($employee->isDirector() && $user->employee->isDirector() != true) return false;

        if ($user->id == $employee->user->id && $user->employee->isDirector() != true) return false;

        return $user->employee->hasPermission(Permissions::EMPLOYEE_ALL_ACTIONS);
    }

    public function delete(User $user, Employee $employee): bool
    {
        if ($employee->isSuperAdmin()) return false; //никто не может удалить супер-админа, даже супер-админ

        if ($user->employee->isSuperAdmin()) return true; //супер админ может удалить всех, кроме себя

        if ($employee->isDirector()) return false; // никто не может удалить директора

        if ($employee->isAdministrator() && $user->employee->isDirector() != true) return false; //администратора может удалить только директор

        if ($user->id == $employee->user->id) return false; // никто не может удалисть сам себя

        return $user->employee->hasPermission(Permissions::EMPLOYEE_ALL_ACTIONS);
    }
}
