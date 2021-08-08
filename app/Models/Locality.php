<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locality extends Model
{
    use HasFactory;

    protected $fillable = ['municipio_id', 'clave', 'nombre', 'activo'];


    // Uno a muchos
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
