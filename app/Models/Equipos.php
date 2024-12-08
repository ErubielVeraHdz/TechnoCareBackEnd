<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipos extends Model
{
    protected $fillable = [
        'nombreU',
        'emailU',
        'dispositivo',
        'numserie',
        'modelo',
        'descripcion',
        'tipomto',
        'estado'
    ];
}