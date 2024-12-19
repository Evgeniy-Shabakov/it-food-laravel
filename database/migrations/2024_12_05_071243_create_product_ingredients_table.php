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
        Schema::create('product_ingredients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('ingredient_id');

            $table->boolean('is_base')->default(false); // Является ли ингредиент базовым
            $table->boolean('can_delete_base ')->default(true); // Можно ли удалить базовый ингредиент
            $table->boolean('can_replace_base')->default(true); // Можно ли заменить базовый ингредиент
            $table->boolean('is_additional')->default(false); // Можно ли добавлять данный ингредиент как дополнительный

            $table->timestamps();

            $table->index('product_id', 'product_ingredients_product_idx');
            $table->foreign('product_id', 'product_ingredients_product_fk')->on('products')->references('id');

            $table->index('ingredient_id', 'product_ingredients_ingredient_idx');
            $table->foreign('ingredient_id', 'product_ingredients_ingredient_fk')->on('ingredients')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_ingredients');
    }
};
