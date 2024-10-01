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
        Schema::create('vuelos', function (Blueprint $table) {
            $table->id('id_vuelo');
            $table->string('origen', 100);
            $table->string('destino', 100); 
            $table->date('fecha_salida');
            $table->time('hora_salida');
            $table->date('fecha_llegada');
            $table->time('hora_llegada');
            $table->string('escala', 50);
            $table->decimal('precio', 10, 2); 
            $table->string('estado_vuelo', 100);
            $table->string('clase_de_vuelo', 100);
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vuelos');
    }
};
