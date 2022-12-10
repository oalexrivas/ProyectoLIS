@extends('layouts.app')
  
@section('content')
<div class="container">
<div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card text-white bg-dark">
                <div class="card-header">Obtener Saldos</div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-right">
                                    <a class="btn btn-primary" href="{{ route('home') }}">Regresar</a>
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
                        
                        <form action="{{ route('consultarsaldo') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-5 col-12">
                                    <label class="text-light" for="cuenta_id">Cuenta Bancaria</label>
                                    <select type="select" class="form-control" name="cuenta_id">
                                        @foreach ($cuentas as $item)
                                            <option value="{{ $item->id }}" {{ $item->id == request('cuenta_id') ? 'selected' : '' }}>{{ $item->alias }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-2 col-12 pt-4">
                                    <button type="submit" class="btn btn-primary">Consultar</button>
                                </div>
                                <div class="col-lg-5 col-12">
                                    <div class="form">
                                        <h3><strong>Saldo:</strong></h3>
                                        <h3>{{ $saldo }}</h3>
                                    </div>
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