@extends('layouts.app')
  
@section('content')
<div class="container">
<div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card text-white bg-dark">
                <div class="card-header">Reporte de Transacciones</div>
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
                        
                        <form action="{{ route('vertrans') }}" method="post">
                            @csrf
                            <div class="row mb-2">
                                <div class="col-lg-4 col-12">
                                    <label class="text-light" for="cuenta_id">Cuenta Bancaria</label>
                                    <select type="select" class="form-control" name="cuenta_id">
                                        @foreach ($cuentas as $item)
                                            <option value="{{ $item->id }}" {{ $item->id == request('cuenta_id') ? 'selected' : '' }}>{{ $item->alias }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <label class="text-light" for="fechainicio">Fecha Inicio</label>
                                    <input type="date" name="inicio" class="form-control" value="{{ $inicio }}">
                                </div>
                                <div class="col-lg-4 col-12">
                                    <label class="text-light" for="fechainicio">Fecha Inicio</label>
                                    <input type="date" name="fin" class="form-control" value="{{ $fin }}">
                                </div>
                            </div>
                            <div class='row'>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                                <button type="submit" class="btn btn-primary">Consultar</button>
                                </div>
                            </div>
                        </form>

                        <table class="table table-dark table-striped table-hover mt-2">
                            <tr>
                                <th>Fecha</th>
                                <th>Tipo</th>
                                <th>Transacción</th>
                                <th>Forma de Pago</th>
                                <th>Monto</th>
                            </tr>
                            @foreach ($transacciones as $tran)
                            <tr>
                                <td>{{ $tran->created_at }}</td>
                                <td>{{ $tran->tipo == 'D' ? 'Deposito' : ($tran->tipo == 'R' ? 'Retiro' : 'Consulta Saldo') }}</td>
                                <td>{{ $tran->tipostransacciones == null ? '' : $tran->tipostransacciones->nombre }}</td>
                                <td>{{ $tran->formaspagos == null ? '' : $tran->formaspagos->nombre }}</td>
                                <td>{{ $tran->monto }}</td>
                            </tr>
                            @endforeach
                        </table>
                    
                        {!! $transacciones->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection