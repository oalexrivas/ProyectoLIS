<?php

namespace App\Http\Controllers;

use App\Tiposcuentas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class tiposCuentasController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposCuentas = Tiposcuentas::where('user_id', Auth::user()->id)->latest()->paginate(5);
  
        return view('tiposCuentas.index',compact('tiposCuentas'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tiposCuentas.create');
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
            'nombre' => 'required',
        ]);
  
        $data = $request->all();
        $data['user_id'] = $request->user()->id;
        Tiposcuentas::create($data);
   
        return redirect()->route('tiposCuentas.index')
                        ->with('success','Tipo de cuenta creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TiposCuentas  $tiposCuentas
     * @return \Illuminate\Http\Response
     */
    public function show(TiposCuentas $tiposCuenta)
    {
        return view('tiposCuentas.show',compact('tiposCuenta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TiposCuentas  $tiposCuentas
     * @return \Illuminate\Http\Response
     */
    public function edit(TiposCuentas $tiposCuenta)
    {
        return view('tiposCuentas.edit',compact('tiposCuenta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TiposCuentas  $tiposCuentas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TiposCuentas $tiposCuenta)
    {
        $request->validate([
            'nombre' => 'required',
        ]);
  
        $tiposCuenta->update($request->all());
  
        return redirect()->route('tiposCuentas.index')
                        ->with('success','Tipo de Cuenta actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TiposCuentas  $tiposCuentas
     * @return \Illuminate\Http\Response
     */
    public function destroy(TiposCuentas $tiposCuenta)
    {
        $tiposCuenta->delete();
  
        return redirect()->route('tiposCuentas.index')
                        ->with('success','Tipo de Cuenta borrado satisfactoriamente');
    }
}