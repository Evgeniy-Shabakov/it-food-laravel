<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ingredient_replacements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ingredient_id');
            $table->unsignedBigInteger('replacement_id');
            $table->timestamps();

            $table->foreign('ingredient_id')
                ->references('id')
                ->on('ingredients');

            $table->foreign('replacement_id')
                ->references('id')
                ->on('ingredients');

            $table->unique(['ingredient_id', 'replacement_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredient_replacements');
    }
};
