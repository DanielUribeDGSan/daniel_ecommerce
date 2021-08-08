<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    use HasFactory;

    protected $fillable = ['estado_id', 'clave', 'nombre', 'activo'];


    public function localities()
    {
        return $this->hasMany(Locality::class);
    }
    // Uno a muchos
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
