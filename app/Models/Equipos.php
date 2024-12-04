<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipos extends Model
{
    protected $fillable = [
        'nombreU',
        'dispositivo',
        'numserie',
        'modelo',
        'descripcion',
        'tipomto',
        'estado'
    ];
}