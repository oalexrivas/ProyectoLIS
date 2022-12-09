<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Tiposcuentas extends Model
{
    protected $fillable = [
        'nombre',
        'user_id',
    ];
}
