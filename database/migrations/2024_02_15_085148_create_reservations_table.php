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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('passenger_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('driver_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('start_point');
            $table->string('destination');
            $table->dateTime('depart_Time');
            $table->enum('status', ['pending' , 'onRoad' , 'cancelled' , 'completed'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
