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
            'background_color' => '#ffffff',
            'text_color' => '#000000',
            'brand_color' => '#f97316',
            'text_color_on_brand_color' => '#ffffff',
            'supporting_color' => '#a6a6a6',
            'accent_text_color' => '#42db00',
        ]);
    }
}
