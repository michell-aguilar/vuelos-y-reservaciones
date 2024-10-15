<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservacion extends Model
{
    use HasFactory;

    protected $table = 'reservaciones';
    protected $primaryKey = 'id_reservacion';
    protected $fillable = ['id_usuario', 'id_vuelo', 'cantidad_asientos', 'fecha_reservacion', 'estado_reservacion'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    public function vuelo()
    {
        return $this->belongsTo(Vuelo::class, 'id_vuelo');
    }
}
