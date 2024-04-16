<?php

namespace App\Service;

use App\Models\User;

class PolicyHelper
{
    static function checkUserOnRoles(User $user, $allowedRoles): bool
    {
        if($user->employee) {
            foreach ($user->employee->roles->pluck('title')->all() as $role) {
                if(in_array($role, $allowedRoles))
                    return true;
            }
        }

        return false;
    }
}
