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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->string('status')->default(0)->comment('0(pending) / 1(paid) / 2(cancel)');

            $table->unsignedBigInteger('tour_id');
            $table->foreign('tour_id')->references('id')->on('tours');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id' )->references('id') ->on('customers');
            $table->unsignedBigInteger('employee_id')->nullable()->default(NULL);
            $table->foreign('employee_id' )->references('id')->on('employees');
            $table->timestamps();//ngay dat
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
