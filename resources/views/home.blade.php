@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card text-white bg-dark">
                    <div class="card-header">Bienvenido al Sistema de Cuentas Bancarias</div>
                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <p>{{ $message }}</p>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="row justify-content-center">
                            <div class="col-lg-4 col-md-6 col-12 py-1">
                                <a class="mx-auto btn btn-dark stretched-link shadow" href="{{ route('RegistrarDeposito') }}">
                                    <img src="img/deposito.png" class="img-size-trans" alt="Depositar" title="Depositar">
                                    <h6>Depositar</h6>
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 py-1">
                                <a class="mx-auto btn btn-dark stretched-link shadow" href="{{ route('RegistrarRetiro') }}">
                                    <img src="img/retiro.png" class="img-size-trans" alt="Retirar" title="Retirar">
                                    <h6>Retirar</h6>
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 py-1">
                                <a class="mx-auto btn btn-dark stretched-link shadow" href="{{ route('saldo') }}">
                                    <img src="img/Saldo.png" class="img-size-trans" alt="Saldo" title="Saldo">
                                    <h6>Obtener Saldos</h6>
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 py-1">
                                <a class="mx-auto btn btn-dark stretched-link shadow" href="{{ route('VerEntradas') }}">
                                    <img src="img/VerDepositos.png" class="img-size-trans" alt="Saldo" title="Saldo">
                                    <h6>Ver Entradas</h6>
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 py-1">
                                <a class="mx-auto btn btn-dark stretched-link shadow" href="{{ route('VerSalidas') }}">
                                    <img src="img/VerRetiros.png" class="img-size-trans" alt="Saldo" title="Saldo">
                                    <h6>Ver Salidas</h6>
                                </a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
