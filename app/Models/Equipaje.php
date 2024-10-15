<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipaje extends Model
{
    use HasFactory;

    protected $table = 'equipaje';
    protected $primaryKey = 'id_equipaje';
    protected $fillable = ['id_cliente', 'id_vuelo', 'peso', 'dimensiones', 'cantidad', 'tipo'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function vuelo()
    {
        return $this->belongsTo(Vuelo::class, 'id_vuelo');
    }
}
