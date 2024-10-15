
@extends('layout.app')

@section('title', 'Reservaciones')

@section('content')
<h5>Tabla de Reservaciones</h5>
<br>
<a class="btn btn-danger btn-sm" href="{{ route('reservacion.create') }}">Agregar nueva reservación</a>
<hr>

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID Reservación</th>
            <th scope="col">ID Usuario</th>
            <th scope="col">ID Vuelo</th>
            <th scope="col">Cantidad de Asientos</th>
            <th scope="col">Fecha de Reservación</th>
            <th scope="col">Estado de Reservación</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($reservaciones as $item) 
        <tr>
            <td>{{ $item->id_reservacion }}</td>
            <td>{{ $item->id_usuario }}</td>
            <td>{{ $item->id_vuelo }}</td>
            <td>{{ $item->cantidad_asientos }}</td>
            <td>{{ $item->fecha_reservacion }}</td>
            <td>{{ $item->estado_reservacion }}</td>
            <td>
                <a class="btn btn-success btn-sm" href="{{ route('reservacion.edit', $item->id_reservacion) }}">Modificar</a>
                <button class="btn btn-danger btn-sm" url="/reservacion/destroy/{{$item->id_reservacion}}" onclick="destroy(this)" token="{{ csrf_token() }}">Eliminar</button>
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
<script src="{{ asset('js/reservacion.js') }}"></script>
@endsection
