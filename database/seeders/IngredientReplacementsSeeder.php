<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientReplacementsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('ingredient_replacements')->insert([
            ['ingredient_id' => 1, 'replacement_id' => 2],
            ['ingredient_id' => 2, 'replacement_id' => 1],
            ['ingredient_id' => 3, 'replacement_id' => 4],
            ['ingredient_id' => 3, 'replacement_id' => 5],
            ['ingredient_id' => 4, 'replacement_id' => 3],
            ['ingredient_id' => 4, 'replacement_id' => 5],
            ['ingredient_id' => 5, 'replacement_id' => 3],
            ['ingredient_id' => 5, 'replacement_id' => 4],
            ['ingredient_id' => 7, 'replacement_id' => 8],
            ['ingredient_id' => 8, 'replacement_id' => 7],
        ]);
    }
}
