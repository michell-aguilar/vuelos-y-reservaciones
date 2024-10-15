
@extends('layout.app')

@section('title', 'Pagos')

@section('content')
<h5>Tabla de Pagos</h5>
<br>
<a class="btn btn-danger btn-sm" href="{{ route('pago.create') }}">Agregar nuevo pago</a>
<hr>

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID Pago</th>
            <th scope="col">ID Reservación</th>
            <th scope="col">Monto</th>
            <th scope="col">Fecha de Pago</th>
            <th scope="col">Método de Pago</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pagos as $item) 
        <tr>
            <td>{{ $item->id_pago }}</td>
            <td>{{ $item->id_reservacion }}</td>
            <td>{{ $item->monto }}</td>
            <td>{{ $item->fecha_pago }}</td>
            <td>{{ $item->metodo_pago }}</td>
            <td>
                <a class="btn btn-success btn-sm" href="{{ route('pago.edit', $item->id_pago) }}">Modificar</a>
                <button class="btn btn-danger btn-sm" url="/pago/destroy/{{$item->id_pago}}" onclick="destroy(this)" token="{{ csrf_token() }}">Eliminar</button>
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
<script src="{{ asset('js/pago.js') }}"></script>
@endsection
