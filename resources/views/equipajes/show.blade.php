@extends('layouts.app')
@extends('layouts.modal')

@section('content')
<hr>
<br>
<div class="container mt-4">
    <div class="card border-danger mx-auto p-2" style="width: 95%;">
        <div class="card-header p-3" style="background-color: #ffcccb; border-color: #ff99cc;" class="border border-danger rounded-end">
            <h2 class="text-center text-danger">EQUIPAJE</h2>
        </div>
        <div class="card-body">
            <h4 class="card-title">Detalles del equipaje registrado.</h4>
            <div class="text-end mb-3">
                <a href="{{ url('equipajes/create') }}" class="btn btn-success">Agregar Nuevo Equipaje</a>
            </div>
            <table class="table table-striped table-hover">
                <thead style="background-color: white;">
                    <tr>
                        <th scope="col" class="text-pink">ID</th>
                        <th scope="col" class="text-pink">CLIENTE</th>
                        <th scope="col" class="text-pink">VUELO</th>
                        <th scope="col" class="text-pink">PESO</th>
                        <th scope="col" class="text-pink">DIMENSIONES</th>
                        <th scope="col" class="text-pink">CANTIDAD</th>
                        <th scope="col" class="text-pink">TIPO</th>
                        <th scope="col" class="text-pink">ACCIONES</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($equipajes as $equipaje)
                        <tr>
                            <th scope="row">{{ $equipaje->id_equipaje }}</th>
                            <td>{{ $equipaje->cliente->nombre }}</td>
                            <td>{{ $equipaje->vuelo->origen }} - {{ $equipaje->vuelo->destino }}</td>
                            <td>{{ $equipaje->peso }} kg</td>
                            <td>{{ $equipaje->dimensiones }}</td>
                            <td>{{ $equipaje->cantidad }}</td>
                            <td>{{ $equipaje->tipo }}</td>
                            <td>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <a href="{{ url('equipajes/' . $equipaje->id_equipaje . '/edit') }}" class="btn" data-bs-toggle="tooltip" data-bs-placement="left" title="Editar">
                                        <i class="bi bi-pencil-square" style="color: rgb(255, 0, 140); font-size: 1.5rem"></i>
                                    </a>
                                    <button type="button" class="btn" onclick="openDeleteModal1({{ $equipaje->id_equipaje }})" data-bs-toggle="tooltip" data-bs-placement="left" title="Eliminar">
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
                ¿Estás seguro de que deseas eliminar este equipaje?
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
        form.action = 'equipajes/' + id;
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
