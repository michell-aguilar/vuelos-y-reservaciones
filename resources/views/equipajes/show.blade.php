
@extends('layout.app')

@section('title', 'Equipajes')

@section('content')
<h5>Tabla de Equipajes</h5>
<br>
<a class="btn btn-danger btn-sm" href="{{ route('equipaje.create') }}">Agregar nuevo equipaje</a>
<hr>

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID Equipaje</th>
            <th scope="col">ID Cliente</th>
            <th scope="col">ID Vuelo</th>
            <th scope="col">Peso (kg)</th>
            <th scope="col">Dimensiones (cm)</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Tipo</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($equipajes as $item) 
        <tr>
            <td>{{ $item->id_equipaje }}</td>
            <td>{{ $item->id_cliente }}</td>
            <td>{{ $item->id_vuelo }}</td>
            <td>{{ $item->peso }}</td>
            <td>{{ $item->dimensiones }}</td>
            <td>{{ $item->cantidad }}</td>
            <td>{{ $item->tipo }}</td>
            <td>
                <a class="btn btn-success btn-sm" href="{{ route('equipaje.edit', $item->id_equipaje) }}">Modificar</a>
                <button class="btn btn-danger btn-sm" url="/equipaje/destroy/{{$item->id_equipaje}}" onclick="destroy(this)" token="{{ csrf_token() }}">Eliminar</button>
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
<script src="{{ asset('js/equipaje.js') }}"></script>
@endsection
