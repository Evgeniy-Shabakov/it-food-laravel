<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            'title' => 'Пиццы',
            'number_in_list' => 1
        ]);
        DB::table('categories')->insert([
            'title' => 'Закуски',
            'number_in_list' => 2
        ]);
        DB::table('categories')->insert([
            'title' => 'Десерты',
            'number_in_list' => 3
        ]);
        DB::table('categories')->insert([
            'title' => 'Кофе',
            'number_in_list' => 4
        ]);
        DB::table('categories')->insert([
            'title' => 'Напитки',
            'number_in_list' => 5
        ]);
        DB::table('categories')->insert([
            'title' => 'Соусы',
            'number_in_list' => 6
        ]);
        DB::table('categories')->insert([
            'title' => 'Другие товары',
            'number_in_list' => 7
        ]);
    }
}
