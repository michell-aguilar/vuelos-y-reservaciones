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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id('id_pago'); // Clave primaria
            $table->unsignedBigInteger('id_reservacion'); // Clave foránea a reservaciones
            $table->decimal('monto', 10, 2);
            $table->timestamp('fecha_pago')->useCurrent(); 
            $table->string('metodo_pago', 50); 
    
            $table->timestamps();
    
            // Relación
            $table->foreign('id_reservacion')->references('id_reservacion')->on('reservaciones')->onDelete('cascade');
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
