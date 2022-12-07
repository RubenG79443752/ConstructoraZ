<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('logo-constructora.jpg') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Constructora') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment-with-locales.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@livewireStyles
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light" style="background-color: #e3f2fd;">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('inicio.png') }}" alt="constructora" width="150">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <img src="{{ asset('MENU.png') }}" alt="constructora" width="30">
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="btn-group" role="group" aria-label="Grupo de botones">
                    @guest
                        <a class="btn btn-primary active" href="{{ url('/') }}">{{ __('Inicio') }}</a>
                    @else
                        <a class="btn btn-primary active" href="{{ url('/') }}">{{ __('Inicio') }}</a>

                        @if(Auth::user()->rol===1)
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Configuraciones
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop">
                                <li><a class="dropdown-item" href="{{ route('variables.index') }}"><i class="bi bi-badge-vr-fill"></i> {{ __('Configuracion (Salario mínimo nacional) ') }}</a></li>
                                <li><a class="dropdown-item" href="{{ route('pais.index') }}"><i class="bi bi-flag"></i> {{ __('Pais de nacionalidad') }}</a></li>

                                <li><a class="dropdown-item" href="{{ route('cargos.index') }}"><i class="bi bi-diagram-3-fill"></i> {{ __('Cargos') }}</a></li>
                                <li><a class="dropdown-item" href="{{ route('empresas.index') }}"><i class="bi bi-building"></i> {{ __('Datos de empresa') }}</a></li>
                            </ul>
                        </div>
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Administrador
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop">
                                <li><a class="dropdown-item" href="{{ route('rols.index') }}"><i class="bi bi-person-bounding-box"></i> {{ __('Roles usuario') }}</a></li>
                                <li><a class="dropdown-item" href="{{ route('users.index') }}"><i class="bi bi-person-bounding-box"></i> {{ __('Modulo usuarios') }}</a></li>
                                <li><hr></li>
                                <li><a class="dropdown-item" href="{{ route('personals.index') }}"><i class="bi bi-card-list"></i> {{ __('Modulo de registro de personal') }}</a></li>
                                <li><a class="dropdown-item" href="{{ route('contratacions.index') }}"><i class="bi bi-person-rolodex"></i> {{ __('Modulo contrataciones') }}</a></li>
                                <li><hr></li>
                                <li><a class="dropdown-item" href="{{ route('horarios.index') }}"><i class="bi bi-clock-history"></i> {{ __('Horarios') }}</a></li>
                                <li><a class="dropdown-item" href="{{ route('lugartrabajos.index') }}"><i class="bi bi-geo-alt-fill"></i> {{ __('Registrar ubicacion de trabajo') }}</a></li>
                                <li><hr></li>

                                <li><a class="dropdown-item" href="{{ route('permisos.index') }}"><i class="bi bi-exclamation-diamond-fill"></i> {{ __('Permisos') }}</a></li>
                                <li><a class="dropdown-item" href="{{ route('menu_asistencia') }}"><i class="bi bi-clipboard-data"></i> {{ __('Modulo de control de asistencia') }}</a></li>
                                <li><hr></li>
                                <li><a class="dropdown-item" href="{{ route('menu_sueldos') }}"><i class="bi bi-file-spreadsheet-fill"></i> {{ __('Modulo de sueldos y salarios') }}</a></li>
                            </ul>
                        </div>
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Trabajador
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop">
                                <li><a class="dropdown-item" href="{{ route('asistencias.create') }}"><i class="bi bi-fingerprint"></i> {{ __('Asistencia (GPS)') }}</a></li>
                                <li><a class="dropdown-item" href="{{ route('index_asistenciaAdmin') }}"><i class="bi bi-display"></i> {{ __('Asistencia manual') }}</a></li>
                                <li><a class="dropdown-item" href="{{ route('form110s.index') }}"><i class="bi bi-file-earmark-arrow-up"></i> {{ __('Modulo registro facturas Form. 110') }}</a></li>
                            </ul>
                        </div>
                        <a class="btn btn-primary" href="{{ url('lista_asistenciaOff') }}"><i class="bi bi-fingerprint"></i> {{ __('Asistencia Offline') }}</a>
                        @else
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Opciones de sistema
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop">
                                @php
                                    $acceso = \App\Models\Acceso::where('user_id',Auth::id())->where('estado','Habilitado')->get();
                                @endphp
                                @foreach ($acceso as $value)
                                <li><a class="dropdown-item" href="{!! route($value->link)  !!}">{!! $value->icono !!} {!! $value->opcion !!}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    @endguest
                    </div>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="btn btn-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                : En linea <img src="{{ asset('enlinea.png') }}" alt="constructora" width="15">
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('password_user') }}"><i class="bi bi-file-lock2"></i> {{ __('Cambiar Password') }}</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="bi bi-box-arrow-right"></i>
                                        {{ __('Cerrar session') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-1">
            @yield('content')
        </main>
    </div>
    @livewireScripts
</body>
</html>
