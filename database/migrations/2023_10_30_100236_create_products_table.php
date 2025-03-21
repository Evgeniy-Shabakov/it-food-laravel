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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image_path');
            $table->string('image_url');
            $table->string('description_short')->nullable();
            $table->text('description_full')->nullable();
            $table->decimal('price_default', 8, 2);

            //добавлено для будущей реализации - СТАРТ
            $table->unsignedTinyInteger('position_in_category')->nullable();

            $table->text('composition')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('calories')->nullable();
            $table->integer('proteins')->nullable();
            $table->integer('fats')->nullable();
            $table->integer('carbohydrates')->nullable();

            $table->boolean('is_new_label')->default(false);
            $table->boolean('is_promotion_label')->default(false);
            $table->boolean('is_discount_label')->default(false);
            $table->boolean('is_popular_label')->default(false);
            $table->boolean('is_spicy_label')->default(false);

            $table->time('start_time_of_sale')->nullable();
            $table->time('end_time_of_sale')->nullable();
            $table->boolean('is_show_label_time_of_sale')->default(false);
            //добавлено для будущей реализации - СТОП


            $table->boolean('is_in_stop_list')->default(false);
            $table->boolean('is_active');
            $table->unsignedBigInteger('category_id');
            $table->timestamps();

            $table->index('category_id', 'category_product_idx');
            $table->foreign('category_id', 'category_product_fk')->on('categories')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
