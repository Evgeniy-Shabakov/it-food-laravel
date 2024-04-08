<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use App\Service\PermissionsHelper;
use App\Service\PolicyHelper;

class ProductPolicy
{
    public function before(User $user, string $ability): bool|null
    {
        if(PolicyHelper::checkUserOnRoles($user, PermissionsHelper::PERMISSIONS['product']))
            return true;

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
