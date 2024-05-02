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
            $table->unsignedSmallInteger('house_number');
            $table->unsignedSmallInteger('corps_number')->nullable();
            $table->unsignedSmallInteger('office_number')->nullable();
            $table->string('info')->nullable();
            $table->boolean('pick_up_available');
            $table->boolean('delivery_available');
            $table->boolean('pick_up_available_at_the_restaurant_counter');
            $table->boolean('delivery_available_at_the_restaurant_to_the_table');
            $table->boolean('pick_up_available_at_the_car_window');
            $table->boolean('delivery_available_in_the_parking_to_car');
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
