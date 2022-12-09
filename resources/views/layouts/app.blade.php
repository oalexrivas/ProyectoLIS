<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sistema de Cuentas Bancarias</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body class="bg-dark">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">Sistema de Cuentas Bancarias</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item {{ Route::is('home') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('home') }}">Operaciones {!! Route::is('home') ? '<span class="sr-only">(current)</span>' : '' !!}</a>
                        </li>
                        <li class="nav-item {{ Request::segment(1) == 'cuentas' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('cuentas.index') }}">Cuentas Bancarias {!! Request::segment(1) == 'cuentas' ? '<span class="sr-only">(current)</span>' : '' !!}</a>
                        </li>
                        <li class="nav-item {{ Request::segment(1) == 'tiposCuentas' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('tiposCuentas.index') }}">Tipos de Cuentas {!! Request::segment(1) == 'tiposCuentas' ? '<span class="sr-only">(current)</span>' : '' !!}</a>
                        </li>
                        <li class="nav-item {{ Request::segment(1) == 'tipostransacciones' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('tipostransacciones.index') }}">Tipos de Transacciones {!! Request::segment(1) == 'tipostransacciones' ? '<span class="sr-only">(current)</span>' : '' !!}</a>
                        </li>
                        <li class="nav-item {{ Request::segment(1) == 'formaspagos' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('formaspagos.index') }}">Formas de Pago {!! Request::segment(1) == 'formaspagos' ? '<span class="sr-only">(current)</span>' : '' !!}</a>
                        </li>                    
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Iniciar Sesión</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Salir
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        <floot class="py-4 container fixed-bottom">
            @yield('footer')
        </foot>
    </div>
</body>
</html>