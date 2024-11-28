<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesignSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('designs')->insert([
            'title' => 'Базовая тема',
            'is_active' => true,
            'background_page_main_color' => '#f3f4f6',
            'background_page_elements_color' => '#ffffff',
            'brand_color' => '#f97316',
            'text_color_main' => '#000000',
            'text_color_on_brand_color' => '#ffffff',
            'text_color_accent' => '#42db00',
            'bottom_nav_color' => '#a6a6a6',
        ]);
    }
}
