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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('gender');
            $table->date('birthday');
            $table->text('address');
            $table->string('phone');
            $table->string('email')->unique();
            // $table->timestamp('email_verified_at')
            //     ->nullable()
            //     ->default(null);
            $table->string('password');
            $table->string('role')->default(2)->comment('1:Admin, 2:Employee');
            // $table->rememberToken();

            $table->unsignedBigInteger('unit_id');
            $table->foreign('unit_id')->references('id')->on('units');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
