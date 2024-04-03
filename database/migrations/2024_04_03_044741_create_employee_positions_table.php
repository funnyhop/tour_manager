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
        Schema::create('employee_positions', function (Blueprint $table) {
            // $table->id();
            $table->date('effective');
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('office_id');


            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('office_id')->references('id')->on('offices');
            $table->timestamps();

            $table->primary(["employee_id", "office_id"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_positions');
    }
};
