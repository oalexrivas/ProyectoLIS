<?php

namespace App\Http\Controllers;

use App\Transacciones;
use App\Cuentas;
use App\Formaspagos;
use App\Tipostransacciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class transaccionesController extends Controller
{
    public function depositos()
    {
        $cuentas = Cuentas::all();
        $formaspagos = Formaspagos::all();
        $tipostransacciones = Tipostransacciones::where('signo',1)->get();
        $tipo = 'D';

        return view('transacciones.registrar', compact('cuentas', 'formaspagos', 'tipostransacciones','tipo'));
    }

    public function retiros()
    {
        $cuentas = Cuentas::all();
        $formaspagos = [];
        $tipostransacciones = Tipostransacciones::where('signo',1)->get();
        $tipo = 'R';

        return view('transacciones.registrar', compact('cuentas', 'formaspagos', 'tipostransacciones','tipo'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if ($data['tipo'] == 'D')
        {
            $request->validate([
                'cuenta_id' => 'required',
                'formaspago_id' => 'required',
                'monto' => 'required',
                'tipostransaccion_id' => 'required',
            ],
            [
                'cuenta_id.required' => 'El número de cuenta es requerido.',
                'formaspago_id.required' => 'La forma de pago es requerida.',
                'monto.required' => 'El monto es requerido.',
                'tipostransaccion_id.required' => 'El tipo transacción es requerido.',
            ]);

            $mensaje='Depósito realizado con éxito.';
        }
        else {
            $request->validate([
                'cuenta_id' => 'required',
                'monto' => 'required',
                'tipostransaccion_id' => 'required',
            ],
            [
                'cuenta_id.required' => 'El número de cuenta es requerido.',
                'monto.required' => 'El monto es requerido.',
                'tipostransaccion_id.required' => 'El tipo transacción es requerido.',
            ]);

            $mensaje='Retiro realizado con éxito.';
        }

        $data['user_id'] = $request->user()->id;
        Transacciones::create($data);



        return redirect()->route('home')
            ->with('success',$mensaje);;
    }
}
