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
        Schema::create('designs', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->boolean('is_active');

            //базовые цвета
            $table->string('background_page_main_color');
            $table->string('background_page_elements_color');

            $table->string('brand_color');

            $table->string('text_color_main');
            $table->string('text_color_on_brand_color');
            $table->string('text_color_accent');

            $table->string('bottom_nav_color');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('designs');
    }
};
