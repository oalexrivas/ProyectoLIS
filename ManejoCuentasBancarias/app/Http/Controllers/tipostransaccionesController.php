<?php

namespace App\Http\Controllers;

use App\Tipostransacciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class tipostransaccionesController extends Controller
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
        $tipostransacciones = Tipostransacciones::where('user_id', Auth::user()->id)->latest()->paginate(5);
  
        return view('tipostransacciones.index',compact('tipostransacciones'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipostransacciones.create');
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
            'signo' => 'required',
        ]);
  
        $data = $request->all();
        $data['user_id'] = $request->user()->id;
        Tipostransacciones::create($data);
   
        return redirect()->route('tipostransacciones.index')
            ->with('success','Forma de pago creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tipostransacciones  $tipostransacciones
     * @return \Illuminate\Http\Response
     */
    public function show(Tipostransacciones $tipostransaccion)
    {
        return view('tipostransacciones.show',compact('tipostransaccion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tipostransacciones  $tipostransacciones
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipostransacciones $tipostransaccion)
    {
        return view('tipostransacciones.edit',compact('tipostransaccion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tipostransacciones  $tipostransacciones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipostransacciones $tipostransaccion)
    {
        $request->validate([
            'nombre' => 'required',
        ]);
  
        $tipostransaccion->update($request->all());
  
        return redirect()->route('tipostransacciones.index')
            ->with('success','Forma de pago actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tipostransacciones  $tipostransacciones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipostransacciones $tipostransaccion)
    {
        $tipostransaccion->delete();
  
        return redirect()->route('tipostransacciones.index')
            ->with('success','Tipo de Cuenta borrado satisfactoriamente');
    }
}