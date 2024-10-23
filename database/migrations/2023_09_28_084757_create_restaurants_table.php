<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('city_id');
            $table->string('street');
            $table->string('house_number');
            $table->string('corps_number')->nullable();
            $table->string('office_number')->nullable();
            $table->string('info')->nullable();
            $table->boolean('delivery_available');
            $table->boolean('pick_up_at_counter_available');
            $table->boolean('pick_up_at_car_window_available');
            $table->boolean('at_restaurant_at_counter_available');
            $table->boolean('at_restaurant_to_table_available');
            $table->boolean('at_restaurant_to_parking_available');
            $table->boolean('is_active');
            $table->timestamps();

            $table->index('city_id', 'restaurant_city_idx');
            $table->foreign('city_id', 'restaurant_city_fk')->on('cities')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};
