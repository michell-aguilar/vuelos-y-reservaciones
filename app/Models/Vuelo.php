<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vuelo extends Model
{
    use HasFactory;

    protected $table = 'vuelos';
    protected $primaryKey = 'id_vuelo';
    protected $fillable = ['origen', 'destino', 'fecha_salida', 'hora_salida', 'hora_llegada', 'precio', 'estado_vuelo', 'clase_de_vuelo'];

    public function reservaciones()
    {
        return $this->hasMany(Reservacion::class, 'id_vuelo');
    }

    public function equipajes()
    {
        return $this->hasMany(Equipaje::class, 'id_vuelo');
    }

    public function aviones()
    {
        return $this->belongsTo(Avion::class, 'id_avion');
    }
}
