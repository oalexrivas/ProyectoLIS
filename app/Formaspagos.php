<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formaspagos extends Model
{
    protected $fillable = [
        'nombre',
        'user_id',
    ];
}
