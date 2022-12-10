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

    public function tipostransacciones()
    {
        return $this->hasOne('App\Tipostransacciones', 'id', 'tipostransaccion_id');
    }

    public function tiposcuentas()
    {
        return $this->hasOne('App\Tiposcuentas', 'id', 'tiposcuenta_id');
    }

    public function formaspagos()
    {
        return $this->hasOne('App\Formaspagos', 'id', 'formaspago_id');
    }
}
