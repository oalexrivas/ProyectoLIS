@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card text-white bg-dark">
                <div class="card-header">Cuentas Bancarias</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-right">
                                    <a class="btn btn-success" href="{{ route('cuentas.create') }}">Agregar</a>
                                </div>
                            </div>
                        </div>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <p>{{ $message }}</p>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    
                        <table class="table table-dark table-striped table-hover mt-2">
                            <tr>
                                <th>Tipo de Cuenta</th>
                                <th>No Cuenta</th>
                                <th>Alias</th>
                                <th width="280px">Acciones</th>
                            </tr>
                            @foreach ($cuentas as $cuenta)
                            <tr>
                                <td>{{ $cuenta->Tiposcuentas->nombre }}</td>
                                <td>{{ $cuenta->cuenta }}</td>
                                <td>{{ $cuenta->alias }}</td>
                                <td>
                                    <form action="{{ route('cuentas.destroy',$cuenta->id) }}" method="POST">
                    
                                        <a class="btn btn-info" href="{{ route('cuentas.show',$cuenta->id) }}">Ver</a>
                        
                                        <a class="btn btn-primary" href="{{ route('cuentas.edit',$cuenta->id) }}">Editar</a>
                    
                                        @csrf
                                        @method('DELETE')
                        
                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    
                        {!! $cuentas->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection