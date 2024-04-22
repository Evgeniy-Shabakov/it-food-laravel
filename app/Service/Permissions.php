<?php

namespace App\Service;

use App\Models\Role;

class Permissions
{
    const COMPANY_ALL_ACTIONS = [Role::SUPER_ADMIN, Role::DIRECTOR, Role::ADMINISTRATOR];

    const COUNTRY_ALL_ACTIONS = [Role::SUPER_ADMIN, Role::DIRECTOR, Role::ADMINISTRATOR];

    const CITY_ALL_ACTIONS = [Role::SUPER_ADMIN, Role::DIRECTOR, Role::ADMINISTRATOR];

    const RESTAURANT_ALL_ACTIONS = [Role::SUPER_ADMIN, Role::DIRECTOR, Role::ADMINISTRATOR];

    const CATEGORY_ALL_ACTIONS = [Role::SUPER_ADMIN, Role::DIRECTOR, Role::ADMINISTRATOR, Role::MENU_MANAGER];

    const PRODUCT_ALL_ACTIONS = [Role::SUPER_ADMIN, Role::DIRECTOR, Role::ADMINISTRATOR, Role::MENU_MANAGER];

    const ADMIN_PANEL_ACCESS = [Role::SUPER_ADMIN, Role::DIRECTOR, Role::ADMINISTRATOR, Role::MENU_MANAGER];

}