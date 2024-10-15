
@extends('layout.app')

@section('title', 'Aerolineas')

@section('content')

<h5>Tabla de Aerolineas</h5>
<br>
<a class="btn btn-danger btn-sm" href="/aerolinea/create">Agregar nueva aerolinea</a>

<hr>

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">País</th>
            <th scope="col">Dirección</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($aerolineas as $item)
        <tr>
            <td>{{ $item->id_aerolinea }}</td>
            <td>{{ $item->nombre }}</td>
            <td>{{ $item->pais }}</td>
            <td>{{ $item->direccion_ubicacion }}</td>
            <td>
                <a class="btn btn-success btn-sm" href="/aerolinea/edit/{{$item->id_aerolinea}}">Modificar</a>
                <button class="btn btn-danger btn-sm" url="/aerolinea/destroy/{{$item->id_aerolinea}}" onclick="destroy(this)" token="{{ csrf_token() }}">Eliminar</button>
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
<script src="{{ asset('js/aerolinea.js') }}"></script>
@endsection
