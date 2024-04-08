<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use App\Service\PermissionsHelper;

class ProductPolicy
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

    public function update(User $user, Product $product): bool
    {
        return false;
    }

    public function delete(User $user, Product $product): bool
    {
        return false;
    }
}
