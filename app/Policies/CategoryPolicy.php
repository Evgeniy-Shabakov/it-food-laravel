<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use App\Service\PermissionsHelper;

class CategoryPolicy
{
    public function before(User $user, string $ability): bool|null
    {
        $allowedRoles = PermissionsHelper::PERMISSIONS['category'];

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

    public function update(User $user, Category $category): bool
    {
        return false;
    }

    public function delete(User $user, Category $category): bool
    {
        return false;
    }
}
