<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
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
        DB::table('roles')->insert([
            'title' => Role::CUSTOMER,
            'description' => Role::CUSTOMER_DESCRIPTION
        ]);

        DB::table('users')->insert([
            'name' => 'Евгений',
            'phone' => '+79121312653',
            'password' => '4654619815sdfasdfasvax'
        ]);

        DB::table('role_user')->insert([
            'user_id' => User::where('phone', '+79121312653')->first()->id,
            'role_id' => Role::where('title', Role::SUPER_ADMIN)->first()->id,
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
