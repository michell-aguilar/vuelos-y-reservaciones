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
    Schema::create('reservaciones', function (Blueprint $table) {
        $table->id('id_reservacion'); // Clave primaria
        $table->unsignedBigInteger('id_usuario'); // FK a usuarios
        $table->unsignedBigInteger('id_vuelo'); // FK a vuelos
        $table->integer('cantidad_asientos'); 
        $table->timestamp('fecha_reservacion')->useCurrent(); 
        $table->string('estado_reservacion', 100); 
        // relaciones
        $table->foreign('id_usuario')->references('id_usuario')->on('usuarios')->onDelete('cascade');
        $table->foreign('id_vuelo')->references('id_vuelo')->on('vuelos')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservaciones');
    }
};
