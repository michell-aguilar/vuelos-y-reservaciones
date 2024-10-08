@extends('layouts.app')
@extends('layouts.modal')

@section('content')
<hr>
<br>
<div class="container mt-4">
    <div class="card border-info mx-auto p-2" style="width: 95%;">
        <div class="card-header p-3" style="background-color: #f8d7da; border-color: #f5c6cb;" class="border border-info rounded-end">
            <h2 class="text-center text-danger">USUARIOS</h2>
        </div>
        <div class="card-body">
            <h4 class="card-title">Detalles de los usuarios registrados.</h4>
            <div class="text-end mb-3">
                <a href="{{ url('usuarios/create') }}" class="btn btn-success">Agregar Nuevo Usuario</a>
            </div>
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">CORREO</th>
                        <th scope="col">TELÉFONO</th>
                        <th scope="col">FECHA DE REGISTRO</th>
                        <th scope="col">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <th scope="row">{{ $usuario->id_usuario }}</th>
                            <td>{{ $usuario->nombre }}</td>
                            <td>{{ $usuario->correo }}</td>
                            <td>{{ $usuario->telefono }}</td>
                            <td>{{ \Carbon\Carbon::parse($usuario->fecha_registro)->format('d-m-Y') }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ url('usuarios/' . $usuario->id_usuario . '/edit') }}" class="btn btn-primary me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger" onclick="openDeleteModal1({{ $usuario->id_usuario }})" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar">
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
                ¿Estás seguro de que deseas eliminar este usuario?
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
        form.action = 'usuarios/' + id;
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
