<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipostransacciones extends Model
{
    protected $fillable = [
        'nombre',
        'signo',
        'user_id',
    ];
}
