@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card text-white bg-dark">
                    <div class="card-header">Bienvenido al Sistema de Cuentas Bancarias</div>

                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-lg-4 col-md-6 col-12 py-1">
                                <a class="mx-auto btn btn-dark stretched-link shadow" href="{{ route('tiposCuentas.index') }}">
                                    <img src="img/tiposcuentas.png" class="img-size-trans" alt="Tipos de Cuentas" title="Tipos de Cuentas">
                                    <h6>Tipos de Cuentas</h6>
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 py-1">
                                <a class="mx-auto btn btn-dark stretched-link shadow" href="{{ route('formaspagos.index') }}">
                                    <img src="img/tiposcuentas.png" class="img-size-trans" alt="Formas de Pagos" title="Formas de Pagos">
                                    <h6>Formas de Pagos</h6>
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 py-1">
                                <a class="mx-auto btn btn-dark stretched-link shadow" href="{{ route('tipostransacciones.index') }}">
                                    <img src="img/tiposcuentas.png" class="img-size-trans" alt="Tipos Transacciones" title="Tipos Transacciones">
                                    <h6>Tipos Transacciones</h6>
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 py-1">
                                <a class="mx-auto btn btn-dark stretched-link shadow" href="{{ route('cuentas.index') }}">
                                    <img src="img/tiposcuentas.png" class="img-size-trans" alt="Cuentas" title="Cuentas">
                                    <h6>Cuentas Bancarias</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
