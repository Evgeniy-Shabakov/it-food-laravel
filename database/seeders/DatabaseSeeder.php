<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Employee;
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

        DB::table('users')->insert([
            'name' => 'Евгений',
            'phone' => '+79121312653',
            'password' => '4654619815sdfasdfasvax'
        ]);

        DB::table('employees')->insert([
            'user_id' => User::where('phone', '+79121312653')->first()->id,
            'first_name' => 'Евгений',
            'last_name' => 'Шабаков',
        ]);

        DB::table('employee_role')->insert([
            'employee_id' => Employee::where('user_id', User::where('phone', '+79121312653')->first()->id)->first()->id,
            'role_id' => Role::where('title', Role::SUPER_ADMIN)->first()->id,
        ]);

        DB::table('companies')->insert([
            'title' => 'ООО "Доставка еды"',
            'brand_title' => 'Food-IT',
            'tagline' => 'Вкусная и полезная еда с доставкой надом',
            'favicon_path' => 'images/favicon.png',
            'favicon_url' => 'http://localhost:8000/storage/images/favicon.png',
            'logo_path' => 'images/logo.png',
            'logo_url' => 'http://localhost:8000/storage/images/logo.png',
        ]);

        DB::table('countries')->insert([
            'title' => 'Россия',
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
