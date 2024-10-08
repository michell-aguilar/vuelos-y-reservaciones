@extends('layouts.app')
@extends('layouts.modal')

@section('content')
<hr>
<br>
<div class="container mt-4">
    <div class="card border-info mx-auto p-2" style="width: 95%;">
        <div class="card-header p-3" style="background-color: #ffcccb; border-color: #ff99cc;" class="border border-info border-start-0 rounded-end">
            <h2 class="text-center text-info">
                <b>RESERVACIONES</b>
            </h2>
        </div>
        <div class="card-body">
            <h4 class="card-title">Detalles de las reservaciones registradas.</h4>
            <div class="text-end mb-3">
                <a href="{{ url('reservaciones/create') }}" class="btn btn-success">Agregar Nueva Reservación</a>
            </div>
            <hr>
            <table class="table table-striped table-hover">
                <thead style="background-color: white;">
                    <tr>
                        <th scope="col" class="text-pink">ID</th>
                        <th scope="col" class="text-pink">USUARIO</th>
                        <th scope="col" class="text-pink">VUELO</th>
                        <th scope="col" class="text-pink">CANTIDAD DE ASIENTOS</th>
                        <th scope="col" class="text-pink">FECHA DE RESERVACIÓN</th>
                        <th scope="col" class="text-pink">ESTADO</th>
                        <th scope="col" class="text-pink">ACCIONES</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($reservaciones as $reservacion)
                        <tr>
                            <th scope="row">{{ $reservacion->id_reservacion }}</th>
                            <td>{{ $reservacion->usuario->nombre }}</td>
                            <td>{{ $reservacion->vuelo->origen }} - {{ $reservacion->vuelo->destino }}</td>
                            <td>{{ $reservacion->cantidad_asientos }}</td>
                            <td>{{ \Carbon\Carbon::parse($reservacion->fecha_reservacion)->format('d-m-Y') }}</td>
                            <td>{{ $reservacion->estado_reservacion }}</td>
                            <td>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <a href="{{ url('reservaciones/' . $reservacion->id_reservacion . '/edit') }}" class="btn" data-bs-toggle="tooltip" data-bs-placement="left" title="Editar">
                                        <i class="bi bi-pencil-square" style="color: blue; font-size: 1.5rem"></i>
                                    </a>
                                    <!-- Botón de Eliminación con Confirmación -->
                                    <button type="button" class="btn" onclick="openDeleteModal1({{ $reservacion->id_reservacion }})" data-bs-toggle="tooltip" data-bs-placement="left" title="Eliminar">
                                        <i class="bi bi-trash3" style="font-size: 1.5rem; color: red"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody> 
            </table>
        </div>
    </div>
</div>

@section('modal')

<!-- Modal de Confirmación de Eliminación -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Eliminación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que deseas eliminar esta reservación?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form id="delete-form" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('styles')
<style>
    .text-pink {
        color: #ff99cc; /* Rosado pastel */
    }

    thead {
        background-color: white; /* Fondo blanco para los encabezados */
    }
</style>
@endsection

<script>
    function openDeleteModal1(id) {
        var form = document.getElementById('delete-form');
        form.action = 'reservaciones/' + id;
        var myModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
        myModal.show();
    }

    document.addEventListener('DOMContentLoaded', function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>

