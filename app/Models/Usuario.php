<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    protected $fillable = ['nombre', 'correo', 'telefono', 'fecha_registro'];

    public function reservaciones()
    {
        return $this->hasMany(Reservacion::class, 'id_usuario');
    }
}
