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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('numero'); // Numero della camera
            $table->string('tipo'); // Tipo di camera (singola, doppia, suite, ecc.)
            $table->decimal('prezzo', 8, 2); // Prezzo della camera
            $table->text('descrizione')->nullable(); // Descrizione della camera (opzionale)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
