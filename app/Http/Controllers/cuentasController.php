<?php

namespace App\Http\Controllers;

use App\Cuentas;
use App\Tiposcuentas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cuentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuentas = Cuentas::where('user_id', Auth::user()->id)->with('tiposcuentas')->latest()->paginate(5);
        
        return view('cuentas.index',compact('cuentas'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tiposcuentas = Tiposcuentas::where('user_id', Auth::user()->id)->get();
        
        return view('cuentas.create',compact('tiposcuentas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'cuenta' => 'required',
            'alias' => 'required',
            'tiposcuenta_id' => 'required',
        ],
        [
            'cuenta.required' => 'El número de cuenta es requerido.',
            'alias.required' => 'El alias de la cuenta es requerido.',
            'tiposcuenta_id.required' => 'El tipo de cuenta es requerido.',
        ]);
  
        $data = $request->all();
        $data['user_id'] = $request->user()->id;
        cuentas::create($data);
   
        return redirect()->route('cuentas.index')
            ->with('success','Forma de pago creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cuentas  $cuentas
     * @return \Illuminate\Http\Response
     */
    public function show(Cuentas $cuenta)
    {
        return view('cuentas.show',compact('cuenta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cuentas  $cuentas
     * @return \Illuminate\Http\Response
     */
    public function edit(Cuentas $cuenta)
    {
        $tiposcuentas = Tiposcuentas::where('user_id', Auth::user()->id)->get();       

        return view('cuentas.edit',compact('cuenta', 'tiposcuentas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cuentas  $cuentas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cuentas $cuenta)
    {
        $request->validate([
            'cuenta' => 'required',
            'alias' => 'required',
            'tiposcuenta_id' => 'required',
        ],
        [
            'cuenta.required' => 'El número de cuenta es requerido.',
            'alias.required' => 'El alias de la cuenta es requerido.',
            'tiposcuenta_id.required' => 'El tipo de cuenta es requerido.',
        ]);
  
        $cuenta->update($request->all());
  
        return redirect()->route('cuentas.index')
            ->with('success','Forma de pago actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cuentas  $cuentas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cuentas $cuenta)
    {
        $cuenta->delete();
  
        return redirect()->route('cuentas.index')
            ->with('success','Tipo de Cuenta borrado satisfactoriamente');
    }
}
