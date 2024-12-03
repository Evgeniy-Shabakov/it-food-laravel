<?php

namespace App\Policies;

use App\Models\Ingredient;
use App\Models\User;
use App\Service\Permissions;

class IngredientPolicy
{
    public function before(User $user, string $ability): bool|null
    {
        if($user->employee->hasPermission(Permissions::INGREDIENT_ALL_ACTIONS))
            return true;

        return null;
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, Ingredient $ingredient): bool
    {
        return false;
    }

    public function delete(User $user, Ingredient $ingredient): bool
    {
        return false;
    }
}
