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
            'min_order_value_for_delivery_by_default' => 1000,
            'delivery_price_by_default' => 200,
            'order_value_for_free_delivery_by_default' => 2000,
        ]);
    }
}
