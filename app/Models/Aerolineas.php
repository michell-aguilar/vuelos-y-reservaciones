<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aerolinea extends Model
{
    use HasFactory;

    protected $table = 'aerolineas';
    protected $primaryKey = 'id_aerolinea';
    protected $fillable = ['nombre', 'pais', 'direccion_ubicacion'];

    public function aviones()
    {
        return $this->hasMany(Avion::class, 'id_aerolinea');
    }
}
