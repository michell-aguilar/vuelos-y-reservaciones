
@extends('layout.app')

@section('title', 'Usuarios')

@section('content')
<h5>Tabla de Usuarios</h5>
<br>
<a class="btn btn-danger btn-sm" href="{{ route('usuario.create') }}">Agregar nuevo usuario</a>
<hr>

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID Usuario</th>
            <th scope="col">Nombre</th>
            <th scope="col">Correo</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Fecha de Registro</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($usuarios as $item) 
        <tr>
            <td>{{ $item->id_usuario }}</td>
            <td>{{ $item->nombre }}</td>
            <td>{{ $item->correo }}</td>
            <td>{{ $item->telefono }}</td>
            <td>{{ $item->fecha_registro }}</td>
            <td>
                <a class="btn btn-success btn-sm" href="{{ route('usuario.edit', $item->id_usuario) }}">Modificar</a>
                <button class="btn btn-danger btn-sm" url="/usuario/destroy/{{$item->id_usuario}}" onclick="destroy(this)" token="{{ csrf_token() }}">Eliminar</button>
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
<script src="{{ asset('js/usuario.js') }}"></script>
@endsection
