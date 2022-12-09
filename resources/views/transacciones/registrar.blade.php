@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card text-white bg-dark">
                    <div class="card-header">{{ $tipo == 'D' ? 'Depósito' : 'Retiro' }} </div>
                    <div class="card-body">
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
                        <form class="needs-validation" id="frmTransaccion" action="{{ route('transacciones.store') }}" method="post"
                            enctype="multipart/form-data" novalidate>
                            <input type="hidden" name="tipo" value="{{ $tipo }}"></input>
                            <div class="row form-group">
                                <div class="col-lg-6 col-12">
                                    <label class="text-light" for="tipostransaccion_id">Tipo de Transacción</label>
                                    <select type="select" class="form-control" name="tipostransaccion_id">
                                        @foreach ($tipostransacciones as $item)
                                            <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <label class="text-light" for="cuenta_id">Cuenta Bancaria</label>
                                    <select type="select" class="form-control" name="cuenta_id">
                                        @foreach ($cuentas as $item)
                                            <option value="{{ $item->id }}">{{ $item->alias }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                @if( $tipo == 'D')
                                    <div class="col-lg-6 col-12">
                                        <label class="text-light" for="formaspago_id">Forma de Pago</label>
                                        <select type="select" class="form-control" name="formaspago_id">
                                            @foreach ($formaspagos as $item)
                                                <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                                <div class="col-lg-6 col-12">
                                    <label class="text-light" for="monto">Monto</label>
                                    <input type="number" class="form-control" name="monto" placeholder="Monto"
                                        min="0.01" step="0.01" required
                                        onkeypress="return onlyNumberKeyAndPoint(event);"></input>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-lg-3 col-12">
                                    <div class="float-right">
                                        <input type="submit" class="btn btn-primary" id="btnGuardar"
                                            value="{{ $tipo == 'D' ? 'Depositar' : 'Retirar' }}"></input>
                                        <input type="button" class="btn btn-outline-light"
                                            onclick="window.location.href = '{{ route('home') }}';" value="Volver"></input>
                                    </div>
                                </div>
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            if (!$('#mensajeValidaciones').is(':empty')) {
                $("#mensajeValidaciones").fadeTo(2000, 500).slideUp(500, function() {
                    $("#mensajeValidaciones").slideUp(500);
                });
            }
        });
    </script>
@endsection
