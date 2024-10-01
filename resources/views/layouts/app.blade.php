<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Registro de vuelos y reservaciones') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-dark bg-dark fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{-- {{ config('app.name', 'Registro de vuelos y reservaciones') --}}
                    {{config('', 'Registro de vuelos y reservaciones')}}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                    @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarme') }}</a>
                                </li>
                            @endif
                        @else
                        <nav class="navbar navbar-dark bg-dark fixed-top">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="#">Registro de vuelos y reservaciones</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                              <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                              <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel"> OPCIONES <i class="bi bi-diagram-3-fill" style="font-size: 1rem; color: rgb(255, 0, 144)"> </i></h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                              </div>
                              <div class="offcanvas-body">
                                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                <div class="row">
                                  <div class="col-sm-4">
                                    <li class="nav-item">
                                      <a class="nav-link active" aria-current="page" href="/home"> <i class="bi bi-house-fill" style="font-size: 2rem; color: rgb(255, 0, 123)"></i><h5>Inicio</h5></a> 
                                    </li>
                                  </div>
                                  <div class="col-sm-4">
                                    <li class="nav-item">
                                      <a class="nav-link" href="/usuarios"><i class="bi bi-people-fill" style="font-size: 2rem; color: rgb(255, 0, 153)"></i><h5>Usuarios</h5></a>
                                    </li>
                                  </div>
                                  <div class="col-sm-4">
                                    <li class="nav-item">
                                      <a class="nav-link" href="/clientes"><i class="bi bi-person-vcard-fill" style="font-size: 2rem; color: rgb(255, 0, 183)"></i><h5>Clientes</h5></a>
                                    </li>
                                  </div>
                                  <div class="col-sm-4">
                                    <li class="nav-item">
                                      <a class="nav-link" href="/vuelos"><i class="bi bi-box-seam-fill" style="font-size: 2rem; color: rgb(255, 0, 170)"></i><h5>Vuelos</h5></a>
                                    </li>
                                  </div>
                                  <div class="col-sm-4">
                                    <li class="nav-item">
                                      <a class="nav-link" href="/aerolineas"><i class="bi bi-caret-up-square-fill" style="font-size: 2rem; color: rgb(255, 0, 204)"></i><h5>Aerolineas</h5></a>
                                    </li>
                                  </div>
                                  <div class="col-sm-4">
                                    <li class="nav-item">
                                      <a class="nav-link" href="/aviones"><i class="bi bi-caret-down-square-fill" style="font-size: 2rem; color: rgb(255, 0, 136)"></i><h5>Aviones</h5></a>
                                    </li>
                                  </div>
                                  <div class="col-sm-4">
                                    <li class="nav-item">
                                      <a class="nav-link" href="/equipajes"> <i class="bi bi-piggy-bank-fill" style="font-size: 2rem; color: rgb(255, 0, 187)"></i><h5>Equipajes</h5></a>
                                    </li>
                                  </div>
                                  <div class="col-sm-4">
                                    <li class="nav-item">
                                      <a class="nav-link" href="/reservaciones"> <i class="bi bi-wrench-adjustable-circle-fill" style="font-size: 2rem; color: rgb(255, 0, 153)"></i> <h5>Reservaciones</h5></a>
                                    </li>
                                  </div>
                                </div>
                                  <div class="col-sm-4">
                                    <li class="nav-item">
                                      <a class="nav-link" href="/pago"> <i class="bi bi-wrench-adjustable-circle-fill" style="font-size: 2rem; color: rgb(255, 0, 212)"></i> <h5>Pagos</h5></a>
                                    </li>
                                  </div>
                                </div>
                                
                                
                                  <hr>
                                  <li class="dropdown">
                                    <i class="bi bi-person-fill-check"  style="font-size: 2.5rem; color: rgb(255, 0, 43)"></i>
                                    <h6 class="dropdown-header">Cuenta</h6>
                                    <a id="navbarDropdown" class="dropdown-item" href="#" role="button" aria-haspopup="false" aria-expanded="true">
                                       <h6><b> {{ Auth::user()->name }}</b></h6>
                                    </a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Cerrar Sesión') }}
                                        </a>
    
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                  
                                    <hr>
                                </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </nav>
                    @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

</body>
</html>
