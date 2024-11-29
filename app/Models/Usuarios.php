<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
     protected $fillable = [
        'name',
        'lastname',
        'email',
        'phone',
        'password',
        'type'
    ];

    protected $hidden = [
        'password'
    ];

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }
}
