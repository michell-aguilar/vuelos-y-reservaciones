<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js']) 
</head>
<body>
    {{-- Nuestro menú --}}
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Sistema de Vuelos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Inicio</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Vuelos
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/vuelo/create">Crear Vuelo</a></li>
                            <li><a class="dropdown-item" href="/vuelo/show">Mostrar Vuelos</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Reservaciones
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/reservacion/create">Crear Reservación</a></li>
                            <li><a class="dropdown-item" href="/reservacion/show">Mostrar Reservaciones</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Usuarios
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/usuario/create">Crear Usuario</a></li>
                            <li><a class="dropdown-item" href="/usuario/show">Mostrar Usuarios</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav> 

    <div class="container-fluid">
        {{-- Aquí irá el contenido de todas las páginas --}}
        @yield('content') 
        @yield('scripts') 
    </div> 

    
</body>
</html>
