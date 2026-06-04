<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion'
    ];

    public function zapatillas()
    {
        return $this->hasMany(Zapatilla::class);
    }
}