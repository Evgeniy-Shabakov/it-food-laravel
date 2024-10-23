<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestaurantSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('restaurants')->insert([
            'title' => 'Первый в НН',
            'city_id' => 1,
            'street' => 'Пр-т Гагарина',
            'house_number' => '135',
            'delivery_available' => true,
            'pick_up_at_counter_available' => true,
            'pick_up_at_car_window_available' => false,
            'at_restaurant_at_counter_available' => true,
            'at_restaurant_to_table_available' => true,
            'at_restaurant_to_parking_available' => false,
            'is_active' => true,
        ]);
    }
}
