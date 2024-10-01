<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipaje extends Model
{
    use HasFactory;
    
    protected $table = 'equipajes'; 
    protected $primaryKey = 'id_equipaje'; 
    protected $fillable = ['id_reservacion', 'peso', 'dimensiones', 'tipo']; 

    public function reservacion()
    {
        return $this->belongsTo(Reservacion::class, 'id_reservacion');
    }
}
