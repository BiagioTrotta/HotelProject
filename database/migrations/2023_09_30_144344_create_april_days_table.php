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
        Schema::create('april_days', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_id')->unique();
            $table->foreign('room_id')->references('id')->on('rooms');
            for ($day = 1; $day <= 30; $day++) {
                $table->unsignedBigInteger('day_' . $day .
                '_user_id')->nullable();
                $table->foreign('day_' . $day .
                '_user_id')->references('id')->on('clients');
            }
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('april_days');
    }
};
