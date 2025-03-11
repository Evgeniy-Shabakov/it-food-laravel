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
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->boolean('is_user_config');
            $table->json('base_ingredients')->nullable();
            $table->json('additional_ingredients')->nullable();
            $table->timestamps();

            $table->index('order_id', 'order_products_order_idx');
            $table->foreign('order_id', 'order_products_order_fk')->on('orders')->references('id');

            $table->index('product_id', 'order_products_product_idx');
            $table->foreign('product_id', 'order_products_product_fk')->on('products')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_products');
    }
};
