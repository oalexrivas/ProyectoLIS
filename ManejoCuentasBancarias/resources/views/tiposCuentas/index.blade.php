@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card text-white bg-dark">
                <div class="card-header">Tipos de Cuentas</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-right">
                                    <a class="btn btn-success" href="{{ route('tiposCuentas.create') }}">Agregar</a>
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
                                <th>Nombre</th>
                                <th width="280px">Acciones</th>
                            </tr>
                            @foreach ($tiposCuentas as $tipoCuenta)
                            <tr>
                                <td>{{ $tipoCuenta->nombre }}</td>
                                <td>
                                    <form action="{{ route('tiposCuentas.destroy',$tipoCuenta->id) }}" method="POST">
                    
                                        <a class="btn btn-info" href="{{ route('tiposCuentas.show',$tipoCuenta->id) }}">Ver</a>
                        
                                        <a class="btn btn-primary" href="{{ route('tiposCuentas.edit',$tipoCuenta->id) }}">Editar</a>
                    
                                        @csrf
                                        @method('DELETE')
                        
                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    
                        {!! $tiposCuentas->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection