<?php

namespace App\Service;

use App\Models\User;

class PolicyHelper
{
    static function checkUserOnRoles(User $user, $allowedRoles): bool
    {
        foreach ($user->roles->pluck('title')->all() as $role) {
            if(in_array($role, $allowedRoles))
                return true;
        }
        return false;
    }
}
