<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aerolinea extends Model
{
    use HasFactory;
    protected $table = 'aerolinea';
    protected $primaryKey = 'id_aerolinea';
    protected $fillable = ['nombre','pais','direccion_de_ubicacion'];

    public function Avion()
    {
        return $this->belongsTo(Avion::class);
    }

}
