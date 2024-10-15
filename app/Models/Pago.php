<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $table = 'pagos';
    protected $primaryKey = 'id_pago';
    protected $fillable = ['id_reservacion', 'monto', 'fecha_pago', 'metodo_pago'];

    public function reservacion()
    {
        return $this->belongsTo(Reservacion::class, 'id_reservacion');
    }
}
