@extends('layouts.app')
  
@section('content')
<div class="container">
<div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card text-white bg-dark">
                <div class="card-header">Crear Tipo de Transacción</div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-right">
                                    <a class="btn btn-primary" href="{{ route('tipostransacciones.index') }}">Regresar</a>
                                </div>
                            </div>
                        </div>
   
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> Hay un problema en la información ingresada.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                        <form action="{{ route('tipostransacciones.store') }}" method="POST">
                            @csrf  
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Nombre:</strong>
                                        <input type="text" name="nombre" class="form-control" placeholder="Nombre">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Afectación:</strong>
                                        <select type="select" class="form-control" name="signo">                                        
                                            <option value="1">Entrada</option>
                                            <option value="-1">Salida</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </div>                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection