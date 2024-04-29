<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insert([
            'title' => Role::SUPER_ADMIN,
            'description' => Role::SUPER_ADMIN_DESCRIPTION
        ]);
        DB::table('roles')->insert([
            'title' => Role::DIRECTOR,
            'description' => Role::DIRECTOR_DESCRIPTION
        ]);
        DB::table('roles')->insert([
            'title' => Role::ADMINISTRATOR,
            'description' => Role::ADMINISTRATOR_DESCRIPTION
        ]);
        DB::table('roles')->insert([
            'title' => Role::MENU_MANAGER,
            'description' => Role::MENU_MANAGER_DESCRIPTION
        ]);
        DB::table('roles')->insert([
            'title' => Role::ORDER_MANAGER,
            'description' => Role::ORDER_MANAGER_DESCRIPTION
        ]);
        DB::table('roles')->insert([
            'title' => Role::COURIER,
            'description' => Role::COURIER_DESCRIPTION
        ]);
    }
}
