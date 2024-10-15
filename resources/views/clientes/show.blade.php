{{-- Heredemos la estructura del archivo app.blade.php --}}
@extends('layout.app')

{{-- Definimos el título --}}
@section('title', 'Clientes')

{{-- Definimos el contenido --}}
@section('content')
<h5>Tabla de Clientes</h5>
<br>
<a class="btn btn-danger btn-sm" href="{{ route('cliente.create') }}">Agregar nuevo cliente</a>
<hr>

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID Cliente</th>
            <th scope="col">Nombre</th>
            <th scope="col">Correo</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Fecha de Registro</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($clientes as $item) 
        <tr>
            <td>{{ $item->id_cliente }}</td>
            <td>{{ $item->nombre }}</td>
            <td>{{ $item->correo }}</td>
            <td>{{ $item->telefono }}</td>
            <td>{{ $item->fecha_registro }}</td>
            <td>
                <a class="btn btn-success btn-sm" href="{{ route('cliente.edit', $item->id_cliente) }}">Modificar</a>
                <button class="btn btn-danger btn-sm" url="/cliente/destroy/{{$item->id_cliente}}" onclick="destroy(this)" token="{{ csrf_token() }}">Eliminar</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('scripts') 

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="{{ asset('js/cliente.js') }}"></script>
@endsection
