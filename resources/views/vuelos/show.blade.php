{{-- Heredemos la estructura del archivo app.blade.php --}}
@extends('layout.app')

{{-- Definimos el título --}}
@section('title', 'Vuelos')

{{-- Definimos el contenido --}}
@section('content')
<h5>Tabla de Vuelos</h5>
<br>
<a class="btn btn-danger btn-sm" href="{{ route('vuelo.create') }}">Agregar nuevo vuelo</a>
<hr>

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID Vuelo</th>
            <th scope="col">Origen</th>
            <th scope="col">Destino</th>
            <th scope="col">Fecha de Salida</th>
            <th scope="col">Hora de Salida</th>
            <th scope="col">Fecha de Llegada</th>
            <th scope="col">Hora de Llegada</th>
            <th scope="col">Escala</th>
            <th scope="col">Precio</th>
            <th scope="col">Estado de Vuelo</th>
            <th scope="col">Clase de Vuelo</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($vuelos as $item) 
        <tr>
            <td>{{ $item->id_vuelo }}</td>
            <td>{{ $item->origen }}</td>
            <td>{{ $item->destino }}</td>
            <td>{{ $item->fecha_salida }}</td>
            <td>{{ $item->hora_salida }}</td>
            <td>{{ $item->fecha_llegada }}</td>
            <td>{{ $item->hora_llegada }}</td>
            <td>{{ $item->escala }}</td>
            <td>{{ $item->precio }}</td>
            <td>{{ $item->estado_vuelo }}</td>
            <td>{{ $item->clase_de_vuelo }}</td>
            <td>
                <a class="btn btn-success btn-sm" href="{{ route('vuelo.edit', $item->id_vuelo) }}">Modificar</a>
                <button class="btn btn-danger btn-sm" url="/vuelo/destroy/{{$item->id_vuelo}}" onclick="destroy(this)" token="{{ csrf_token() }}">Eliminar</button>
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
<script src="{{ asset('js/vuelo.js') }}"></script>
@endsection
