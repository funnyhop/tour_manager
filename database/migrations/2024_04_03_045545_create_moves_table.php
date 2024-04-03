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
        Schema::create('moves', function (Blueprint $table) {
            // $table->id();
            $table->date('date_of_tour');
            $table->unsignedBigInteger('tour_id');
            $table->unsignedBigInteger('location_id');
            $table->unsignedBigInteger('vehicle_id');

            $table->foreign('tour_id')->references('id')->on('tours');
            $table->foreign('location_id')->references('id')->on('locations');
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
            $table->timestamps();

            $table->primary(['tour_id', 'location_id', 'vehicle_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moves');
    }
};
