<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';
    protected $primaryKey = 'id_cliente';
    protected $fillable = ['nombre', 'correo', 'telefono', 'fecha_registro'];

    public function equipajes()
    {
        return $this->hasMany(Equipaje::class, 'id_cliente');
    }
}
