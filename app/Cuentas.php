<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuentas extends Model
{
    protected $fillable = [
        'cuenta',
        'alias',
        'tiposcuenta_id',
        'user_id',
    ];

    public function tiposcuentas()
    {
        return $this->hasOne('App\Tiposcuentas', 'id', 'tiposcuenta_id');
    }
}
