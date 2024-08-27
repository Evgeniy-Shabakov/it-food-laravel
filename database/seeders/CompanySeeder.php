<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('companies')->insert([
            'title' => 'ООО "Доставка еды"',
            'brand_title' => 'Food-IT',
            'tagline' => 'Вкусная и полезная еда с доставкой надом',
            'favicon_path' => 'images/favicon.png',
            'favicon_url' => config('app.url') . '/storage/images/favicon.png',
            'logo_path' => 'images/logo.png',
            'logo_url' => config('app.url') . '/storage/images/logo.png',
            'phone' => '+79121312653',
            'open_time' => '09:00:00',
            'close_time' => '21:00:00',
        ]);
    }
}
