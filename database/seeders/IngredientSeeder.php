<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('ingredients')->insert([
            'title' => 'Сыр',
            'image_path' => 'images/ingredients/Сыр.png',
            'image_url' => config('app.url') . '/storage/images/ingredients/Сыр.png',
            'description' => '',
            'price_default' => 30,
            'is_active' => true,
        ]);

        DB::table('ingredients')->insert([
            'title' => 'Бекон',
            'image_path' => 'images/ingredients/Бекон.png',
            'image_url' => config('app.url') . '/storage/images/ingredients/Бекон.png',
            'description' => '',
            'price_default' => 35,
            'is_active' => true,
        ]);

        DB::table('ingredients')->insert([
            'title' => 'Шампиньоны',
            'image_path' => 'images/ingredients/Шампиньоны.png',
            'image_url' => config('app.url') . '/storage/images/ingredients/Шампиньоны.png',
            'description' => '',
            'price_default' => 20,
            'is_active' => true,
        ]);

        DB::table('ingredients')->insert([
            'title' => 'Лук',
            'image_path' => 'images/ingredients/Лук.png',
            'image_url' => config('app.url') . '/storage/images/ingredients/Лук.png',
            'description' => '',
            'price_default' => 10,
            'is_active' => true,
        ]);

        DB::table('ingredients')->insert([
            'title' => 'Огурец',
            'image_path' => 'images/ingredients/Огурец.png',
            'image_url' => config('app.url') . '/storage/images/ingredients/Огурец.png',
            'description' => '',
            'price_default' => 10,
            'is_active' => true,
        ]);

        DB::table('ingredients')->insert([
            'title' => 'Фирменный соус',
            'image_path' => 'images/ingredients/Фирменный соус.png',
            'image_url' => config('app.url') . '/storage/images/ingredients/Фирменный соус.png',
            'description' => '',
            'price_default' => 15,
            'is_active' => true,
        ]);

        DB::table('ingredients')->insert([
            'title' => 'Кетчуп',
            'image_path' => 'images/ingredients/Кетчуп.png',
            'image_url' => config('app.url') . '/storage/images/ingredients/Кетчуп.png',
            'description' => '',
            'price_default' => 10,
            'is_active' => true,
        ]);

        DB::table('ingredients')->insert([
            'title' => 'Горчица',
            'image_path' => 'images/ingredients/Горчица.png',
            'image_url' => config('app.url') . '/storage/images/ingredients/Горчица.png',
            'description' => '',
            'price_default' => 10,
            'is_active' => true,
        ]);
    }
}
