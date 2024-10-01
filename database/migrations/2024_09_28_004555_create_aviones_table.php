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
        Schema::create('aviones', function (Blueprint $table) {
            $table->id('id_avion'); // Clave primaria
            $table->unsignedBigInteger('id_aerolinea'); // Clave foránea para aerolíneas
            $table->string('modelo'); 
            $table->integer('capacidad'); 
    
            //Relación
            $table->foreign('id_aerolinea')->references('id_aerolinea')->on('aerolineas')->onDelete('cascade');
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aviones');
    }
};
