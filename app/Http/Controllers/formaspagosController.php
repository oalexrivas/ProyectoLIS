<?php

namespace App\Http\Controllers;

use App\Formaspagos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class formaspagosController extends Controller
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
        $formaspagos = Formaspagos::where('user_id', Auth::user()->id)->latest()->paginate(5);
  
        return view('formaspagos.index',compact('formaspagos'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formaspagos.create');
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
        Formaspagos::create($data);
   
        return redirect()->route('formaspagos.index')
            ->with('success','Forma de pago creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Formaspagos  $formaspagos
     * @return \Illuminate\Http\Response
     */
    public function show(Formaspagos $formaspago)
    {
        return view('formaspagos.show',compact('formaspago'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Formaspagos  $formaspagos
     * @return \Illuminate\Http\Response
     */
    public function edit(Formaspagos $formaspago)
    {
        return view('formaspagos.edit',compact('formaspago'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Formaspagos  $formaspagos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Formaspagos $formaspago)
    {
        $request->validate([
            'nombre' => 'required',
        ]);
  
        $formaspago->update($request->all());
  
        return redirect()->route('formaspagos.index')
            ->with('success','Forma de pago actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Formaspagos  $formaspagos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Formaspagos $formaspago)
    {
        $formaspago->delete();
  
        return redirect()->route('formaspagos.index')
            ->with('success','Tipo de Cuenta borrado satisfactoriamente');
    }
}
