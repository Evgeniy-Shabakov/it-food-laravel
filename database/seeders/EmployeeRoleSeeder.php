<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeRoleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('employee_role')->insert([
            'employee_id' => Employee::where('user_id', User::where('phone', '+79121312653')->first()->id)->first()->id,
            'role_id' => Role::where('title', Role::SUPER_ADMIN)->first()->id,
        ]);
    }
}
