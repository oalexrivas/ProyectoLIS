<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transacciones extends Model
{
    protected $fillable = [
        'tipo',
        'cuenta_id',
        'tipostransaccion_id',
        'formaspago_id',
        'monto',
        'user_id',
    ];
}
