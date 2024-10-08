<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avion extends Model
{
    use HasFactory;

    protected $table = 'aviones';
    protected $primaryKey = 'id_avion';
    protected $fillable = ['modelo', 'capacidad', 'id_aerolinea'];

    public function aerolinea()
    {
        return $this->belongsTo(Aerolinea::class, 'id_aerolinea');
    }
}
