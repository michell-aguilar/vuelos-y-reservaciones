<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avion extends Model
{
    use HasFactory;
    protected $table = 'aviones';
    protected $primaryKey = 'id_avion';
    protected $foreignKey = 'id_aerolinea';
    protected $fillable = ['modelo','capacidad'];

    public function Aerolineas()
    {
        return $this->hasMany(Aerolinea::class, 'id_aerolinea');
    }

}
