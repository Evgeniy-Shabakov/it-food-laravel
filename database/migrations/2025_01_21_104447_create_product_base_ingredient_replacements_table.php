<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_base_ingredient_replacements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_base_ingredient_id');
            $table->unsignedBigInteger('replacement_ingredient_id');
            $table->timestamps();

            $table->foreign('product_base_ingredient_id', 'product_base_ingredient_replacements_product_base_ingredient_fk')
                ->references('id')
                ->on('product_base_ingredients')
                ->onDelete('cascade');

            $table->foreign('replacement_ingredient_id', 'product_base_ingredient_replacements_replacement_ingredient_fk')
                ->references('id')
                ->on('ingredients')
                ->onDelete('cascade');

            $table->unique(['product_base_ingredient_id', 'replacement_ingredient_id'], 'product_base_ingredient_replacements_unique_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_base_ingredient_replacements');
    }
};
