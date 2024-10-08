@extends('layouts.app')
@extends('layouts.modal')

@section('content')
<hr>
<br>
<div class="container mt-4">
    <div class="card border-info mx-auto p-2" style="width: 95%;">
        <div class="card-header p-3" style="background-color: #ffcccb; border-color: #ff99cc;" class="border border-info rounded-end">
            <h2 class="text-center text-info">VUELOS</h2>
        </div>
        <div class="card-body">
            <h4 class="card-title">Detalles de los vuelos registrados.</h4>
            <div class="text-end mb-3">
                <a href="{{ url('vuelos/create') }}" class="btn btn-success">Agregar Nuevo Vuelo</a>
            </div>
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">ORIGEN</th>
                        <th scope="col">DESTINO</th>
                        <th scope="col">FECHA DE SALIDA</th>
                        <th scope="col">HORA DE SALIDA</th>
                        <th scope="col">FECHA DE LLEGADA</th>
                        <th scope="col">HORA DE LLEGADA</th>
                        <th scope="col">PRECIO</th>
                        <th scope="col">ESTADO</th>
                        <th scope="col">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vuelos as $vuelo)
                        <tr>
                            <th scope="row">{{ $vuelo->id_vuelo }}</th>
                            <td>{{ $vuelo->origen }}</td>
                            <td>{{ $vuelo->destino }}</td>
                            <td>{{ \Carbon\Carbon::parse($vuelo->fecha_salida)->format('d-m-Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($vuelo->hora_salida)->format('H:i') }}</td>
                            <td>{{ \Carbon\Carbon::parse($vuelo->fecha_llegada)->format('d-m-Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($vuelo->hora_llegada)->format('H:i') }}</td>
                            <td>{{ number_format($vuelo->precio, 2) }} $</td>
                            <td>{{ $vuelo->estado_vuelo }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ url('vuelos/' . $vuelo->id_vuelo . '/edit') }}" class="btn btn-primary me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger" onclick="openDeleteModal1({{ $vuelo->id_vuelo }})" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar">
                                        <i class="bi bi-trash3"></i>
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
@endsection

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
                ¿Estás seguro de que deseas eliminar este vuelo?
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

<script>
    function openDeleteModal1(id) {
        var form = document.getElementById('delete-form');
        form.action = 'vuelos/' + id;
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
