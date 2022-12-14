<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Transacciones;
use App\Cuentas;
use App\Formaspagos;
use App\Tipostransacciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class transaccionesController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $tipostransacciones = Tipostransacciones::where('signo',-1)->get();
        $tipo = 'R';

        return view('transacciones.registrar', compact('cuentas', 'formaspagos', 'tipostransacciones','tipo'));
    }

    public function versaldo()
    {
        $cuentas = Cuentas::all();
        $saldo = 0;
        
        return view('transacciones.saldo', compact('cuentas', 'saldo'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function consultarsaldo(Request $request)
    {
        $cuentas = Cuentas::all();
        $saldo = Transacciones::where('user_id', Auth::user()->id)
            ->where('cuenta_id', $request->get('cuenta_id'))
            ->where('tipo', '<>','S')
            ->sum('monto');
        
        $transaccion = new Transacciones;
        $transaccion->tipo = 'S';
        $transaccion->cuenta_id = $request->get('cuenta_id');
        $transaccion->monto = $saldo;
        $transaccion->user_id = Auth::user()->id;
        $transaccion->save();

        return view('transacciones.saldo', compact('cuentas', 'saldo'));
    }

    public function vertransacciones()
    {
        $cuentas = Cuentas::all();
        $transacciones = Transacciones::where('user_id', Auth::user()->id)
            ->where('cuenta_id', -1)
            ->latest()->paginate(25);
        $inicio = date("Y-m-01");
        $fin = date("Y-m-d");
        return view('transacciones.index', compact('cuentas', 'transacciones', 'inicio', 'fin'))
            ->with('i', (request()->input('page', 1) - 1) * 25);
    }

    public function consultartransacciones(Request $request)
    {
        $cuentas = Cuentas::all();
        $transacciones = Transacciones::where('user_id', Auth::user()->id)
            ->where('cuenta_id', $request->get('cuenta_id'))
            ->whereBetween('created_at', [Carbon::parse($request->get('inicio'))->startOfDay(), Carbon::parse($request->get('fin'))->endOfDay()])
            ->orderBy('created_at', 'ASC')
            ->latest()->paginate(25);
        
        $inicio = $request->get('inicio');
        $fin = $request->get('fin');

        return view('transacciones.index', compact('cuentas', 'transacciones', 'inicio', 'fin'))
            ->with('i', (request()->input('page', 1) - 1) * 25);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $tipostransacciones = Tipostransacciones::where('id',$data['tipostransaccion_id'])->first();
        $data['monto'] = $data['monto'] * $tipostransacciones->signo;

        if($data['tipo'] == 'R')
        {
            $saldo = Transacciones::where('tipo', '<>','S')->sum('monto');
            $request->merge(['saldo' => $saldo + $data['monto']]);
        }

        if ($data['tipo'] == 'D')
        {
            $request->validate([
                'cuenta_id' => 'required',
                'formaspago_id' => 'required',
                'monto' => 'required',
                'tipostransaccion_id' => 'required',
            ],
            [
                'cuenta_id.required' => 'El n??mero de cuenta es requerido.',
                'formaspago_id.required' => 'La forma de pago es requerida.',
                'monto.required' => 'El monto es requerido.',
                'tipostransaccion_id.required' => 'El tipo transacci??n es requerido.',
            ]);

            $mensaje='Dep??sito realizado con ??xito.';
        }
        else {
            $request->validate([
                'cuenta_id' => 'required',
                'monto' => 'required|min:0',
                'tipostransaccion_id' => 'required',
                'saldo' => 'numeric|min:0',
            ],
            [
                'cuenta_id.required' => 'El n??mero de cuenta es requerido.',
                'monto.required' => 'El monto es requerido.',
                'tipostransaccion_id.required' => 'El tipo transacci??n es requerido.',
                'saldo.min' => "El monto no puede ser mayor al saldo de la cuenta (Saldo: $saldo).",
            ]);

            $mensaje='Retiro realizado con ??xito.';
        }

        $data['user_id'] = $request->user()->id;
        Transacciones::create($data);



        return redirect()->route('home')
            ->with('success',$mensaje);
    }
}
