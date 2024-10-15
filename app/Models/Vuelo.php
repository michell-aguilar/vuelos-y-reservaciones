<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avion extends Model
{
    protected $table = 'aviones';
    protected $fillable = ['modelo', 'capacidad', 'id_aerolinea'];

    public function aerolinea()
    {
        return $this->belongsTo(Aerolinea::class, 'id_aerolinea');
    }

    public function vuelos()
    {
        return $this->hasMany(Vuelo::class, 'id_avion');
    }
}