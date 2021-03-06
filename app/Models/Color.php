<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'hex', 'id'];

    // Relacion muchos a muchos inversa
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    // Relacion muchos a muchos inversa
    public function sizes()
    {
        return $this->belongsToMany(Size::class);
    }
}
