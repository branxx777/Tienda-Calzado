<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zapatilla extends Model
{
    protected $fillable = [
        'marca_id',
        'modelo',
        'talla',
        'precio',
        'imagen'
    ];

    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }
}