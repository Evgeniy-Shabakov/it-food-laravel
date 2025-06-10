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
      Schema::create('addresses', function (Blueprint $table) {
         $table->id();
         $table->string('title')->nullable();
         $table->unsignedBigInteger('user_id');
         $table->unsignedBigInteger('city_id');
         $table->string('street');
         $table->string('house_number');
         $table->string('corps_number')->nullable();
         $table->string('apartment_number')->nullable();
         $table->smallInteger('entrance_number')->nullable();
         $table->smallInteger('floor')->nullable();
         $table->string('entrance_code')->nullable();
         $table->string('comment', 500)->nullable();
         $table->boolean('show_to_user')->default(true); //для фейкового удаления адреса,т.к. адрес не может быть удален если привязан к заказу
         $table->decimal('latitude', 21, 18)->nullable(); // широта
         $table->decimal('longitude', 21, 18)->nullable(); // долгота
         $table->string('value_string', 500)->nullable(); // адрес в виде строки
         $table->json('data')->nullable(); // для хранения данных со стороннего API
         $table->timestamps();

         $table->index('user_id', 'address_user_idx');
         $table->foreign('user_id', 'address_user_fk')->on('users')->references('id');

         $table->index('city_id', 'address_city_idx');
         $table->foreign('city_id', 'address_city_fk')->on('cities')->references('id');
      });
   }

   /**
    * Reverse the migrations.
    */
   public function down(): void
   {
      Schema::dropIfExists('addresses');
   }
};
