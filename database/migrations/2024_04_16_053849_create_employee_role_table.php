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
        Schema::create('employee_role', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('role_id');
            $table->timestamps();

            //IDX
            $table->index('employee_id', 'employee_role_employee_idx');
            $table->index('role_id', 'employee_role_role_idx');

            //FK
            $table->foreign('employee_id', 'employee_role_employee_fk')->on('employees')->references('id');
            $table->foreign('role_id', 'employee_role_role_fk')->on('roles')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_role');
    }
};
