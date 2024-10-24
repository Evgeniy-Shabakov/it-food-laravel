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
            $table->string('background_color');
            $table->string('text_color');

            $table->string('brand_color');
            $table->string('text_color_on_brand_color');

            $table->string('supporting_color');

            $table->string('accent_text_color');


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
