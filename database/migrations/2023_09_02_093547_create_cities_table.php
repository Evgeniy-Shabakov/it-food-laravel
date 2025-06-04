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
      Schema::create('cities', function (Blueprint $table) {
         $table->id();
         $table->string('title');
         $table->unsignedBigInteger('country_id');
         $table->decimal('min_order_value_for_delivery_by_default', 8, 2)->default(0);
         $table->decimal('delivery_price_by_default', 8, 2)->default(0);
         $table->decimal('order_value_for_free_delivery_by_default', 8, 2)->nullable();
         $table->text('map_iframe')->nullable();
         $table->json('geojson')->nullable();
         $table->timestamps();

         $table->index('country_id', 'city_country_idx');
         $table->foreign('country_id', 'city_country_fk')->on('countries')->references('id');
      });
   }

   /**
    * Reverse the migrations.
    */
   public function down(): void
   {
      Schema::dropIfExists('cities');
   }
};
