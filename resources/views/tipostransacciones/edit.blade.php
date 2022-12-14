@extends('layouts.app')
   
@section('content')
<div class="container">
<div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card text-white bg-dark">
                <div class="card-header">Editar Tipo de Transacción</div>
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
  
                        <form action="{{ route('tipostransacciones.update',$tipostransaccione) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Id:</strong>
                                        {{ $tipostransaccione->id }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Nombre:</strong>
                                        <input type="text" name="nombre" value="{{ $tipostransaccione->nombre }}" class="form-control" placeholder="Nombre">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <fieldset disabled>
                                        <div class="form-group" style="display: none;">
                                            <strong>Signo:</strong>
                                            <select type="select" class="form-control" name="signo">
                                                <option value="+" {{ $tipostransaccione->signo == '+' ? 'selected' : '' }}>+</option>
                                                <option value="-" {{ $tipostransaccione->signo == '-' ? 'selected' : '' }}>-</option>
                                            </select>
                                        </div>
                                    </fieldset> 
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                                    <butipostransaccioneon type="submit" class="btn btn-primary">Guardar</butipostransaccioneon>
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