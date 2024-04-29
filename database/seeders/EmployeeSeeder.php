<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('employees')->insert([
            'user_id' => User::where('phone', '+79121312653')->first()->id,
            'first_name' => 'Евгений',
            'last_name' => 'Шабаков',
        ]);
    }
}
