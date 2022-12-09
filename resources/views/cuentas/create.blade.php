@extends('layouts.app')
  
@section('content')
<div class="container">
<div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card text-white bg-dark">
                <div class="card-header">Crear Cuenta Bancaria</div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-right">
                                    <a class="btn btn-primary" href="{{ route('cuentas.index') }}">Regresar</a>
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
                        
                        <form action="{{ route('cuentas.store') }}" method="POST">
                            @csrf  
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Tipo de Cuenta:</strong>
                                        <select type="select" class="form-control" name="tiposcuenta_id">
                                            @foreach ($tiposcuentas as $tipo)
                                                <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                                            @endforeach
                                    </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>No Cuenta:</strong>
                                        <input type="text" name="cuenta" class="form-control" placeholder="Número de cuenta">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Alias:</strong>
                                        <input type="text" name="alias" class="form-control" placeholder="Alias">
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