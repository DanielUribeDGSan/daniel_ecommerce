<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $fillable = ['clave', 'nombre', 'abrev', 'abrev', 'activo'];

    // Uno a muchos
    public function municipalities()
    {
        return $this->hasMany(Municipality::class);
    }
    // Uno a muchos
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
