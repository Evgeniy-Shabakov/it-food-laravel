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
        Schema::create('product_base_ingredients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('ingredient_id');
            $table->boolean('can_delete')->default(true); // Можно ли удалить базовый ингредиент
            $table->boolean('can_replace')->default(true); // Можно ли заменить базовый ингредиент
            $table->timestamps();

            $table->index('product_id', 'product_base_ingredients_product_idx');
            $table->foreign('product_id', 'product_base_ingredients_product_fk')
                ->on('products')
                ->references('id')
                ->onDelete('cascade');

            $table->index('ingredient_id', 'product_base_ingredients_ingredient_idx');
            $table->foreign('ingredient_id', 'product_base_ingredients_ingredient_fk')
                ->on('ingredients')
                ->references('id');

            $table->unique(['product_id', 'ingredient_id'], 'product_base_ingredients_unique_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_base_ingredients');
    }
};
