<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at', 'status'];


    // Estatus de compra
    const PENDIENTE = 1;
    const RECIBIDO = 2;
    const ENVIADO = 3;
    const ENTREGADO = 4;
    const ANULADO = 5;
    // Envios
    const TIENDA = 1;
    const CASA = 2;

    // Relacion 1 a muchos inversa

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function municipality()
    {
        return $this->belongsTo(Municipality::class);
    }

    public function locality()
    {
        return $this->belongsTo(Locality::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
