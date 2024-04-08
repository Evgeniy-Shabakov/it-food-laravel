<?php

namespace App\Service;

use App\Models\Role;

class PermissionsHelper
{
    const PERMISSIONS = [

        'company' => [Role::SUPER_ADMIN, Role::DIRECTOR, Role::ADMINISTRATOR],

        'country' => [Role::SUPER_ADMIN, Role::DIRECTOR, Role::ADMINISTRATOR],

        'city' => [Role::SUPER_ADMIN, Role::DIRECTOR, Role::ADMINISTRATOR],

        'restaurant' => [Role::SUPER_ADMIN, Role::DIRECTOR, Role::ADMINISTRATOR],

        'category' => [Role::SUPER_ADMIN, Role::DIRECTOR, Role::ADMINISTRATOR, Role::MENU_MANAGER],

        'product' => [Role::SUPER_ADMIN, Role::DIRECTOR, Role::ADMINISTRATOR, Role::MENU_MANAGER],
    ];
}
