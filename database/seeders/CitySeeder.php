<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('cities')->insert([
            'title' => 'Нижний Новгород',
            'country_id' => 1,
            'min_order_value_for_delivery' => 1000,
            'delivery_price' => 200,
            'order_value_for_free_delivery' => 2000,
        ]);
    }
}
