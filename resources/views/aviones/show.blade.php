{{-- Heredemos la estructura del archivo app.blade.php --}}

@extends('layout.app')

{{-- Definimos el título --}}
@section('title', 'Aviones')

{{-- Definimos el contenido --}}
@section('content')

<h5>Tabla de Aviones</h5>
<br>
<a class="btn btn-danger btn-sm" href="/avion/create">Agregar nuevo avion</a>

<hr>

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Modelo</th>
            <th scope="col">Capacidad</th>
            <th scope="col">Aerolinea</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($aviones as $item)
        <tr>
            <td>{{ $item->id_avion }}</td>
            <td>{{ $item->modelo }}</td>
            <td>{{ $item->capacidad }}</td>
            <td>{{ $item->aerolinea->nombre }}</td>
            <td>
                <a class="btn btn-success btn-sm" href="/avion/edit/{{$item->id_avion}}">Modificar</a>
                <button class="btn btn-danger btn-sm" url="/avion/destroy/{{$item->id_avion}}" onclick="destroy(this)" token="{{ csrf_token() }}">Eliminar</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection

@section('scripts')
{{-- SweetAlert --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{-- JS --}}
<script src="{{ asset('js/avion.js') }}"></script>
@endsection
