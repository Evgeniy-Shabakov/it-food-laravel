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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->string('number');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('restaurant_id');
            $table->unsignedBigInteger('responsible_employee_id');
            $table->unsignedBigInteger('courier_employee_id')->nullable();
            $table->unsignedBigInteger('user_address_id')->nullable();
            $table->string('order_type');
            $table->boolean('pack_takeaway');
            $table->decimal('total_price', 8, 2);
            $table->string('payment_type');
            $table->decimal('banknote_for_change', 8, 2);
            $table->boolean('is_payment');
            $table->string('comment');
            $table->string('order_status');

            $table->timestamps();

            $table->index('user_id', 'order_user_idx');
            $table->foreign('user_id', 'order_user_fk')->on('users')->references('id');

            $table->index('city_id', 'order_city_idx');
            $table->foreign('city_id', 'order_city_fk')->on('cities')->references('id');

            $table->index('restaurant_id', 'order_restaurant_idx');
            $table->foreign('restaurant_id', 'order_restaurant_fk')->on('restaurants')->references('id');

            $table->index('responsible_employee_id', 'order_responsible_idx');
            $table->foreign('responsible_employee_id', 'order_responsible_fk')->on('employees')->references('id');

            $table->index('courier_employee_id', 'order_courier_idx');
            $table->foreign('courier_employee_id', 'order_courier_fk')->on('employees')->references('id');

            $table->index('user_address_id', 'order_user_address_idx');
            $table->foreign('user_address_id', 'order_user_address_fk')->on('addresses')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
