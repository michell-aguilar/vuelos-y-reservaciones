@extends('layouts.app')
@extends('layouts.modal')

@section('content')
<hr>
<br>
    <div class="card border-info mx-auto p-2" style="width: 95%;">
        <div class="card header p-3 bg-info bg-opacity-10 border border-info border-start-0 rounded-end">
         <h2 class="text-center">
            <b>
                CLIENTES
            </b>
         </h2>
        </div>
        <div class="card-body">
          <h4 class="card-title">Detalles de los clientes registrados.</h4>
          <div class="text-end">
           <br>
            <hr>
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">NOMBRE</th>
                      <th scope="col">CORREO</th>
                      <th scope="col">TELÉFONO</th>
                      <th scope="col">FECHA DE REGISTRO</th>
                      <th scope="col">ACCIONES</th>
                    </tr>
                  </thead>
          <tbody class="table-group-divider">
                @foreach ($clientes as $cliente)
                   <tr>
                    <th scope="row">{{ $cliente->id_cliente }}</th>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->correo }}</td>
                    <td>{{ $cliente->telefono }}</td>
                    <td>{{ \Carbon\Carbon::parse($cliente->fecha_registro)->format('d-m-Y') }}</td>
                    <td>
                      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ url('clientes/' . $cliente->id_cliente . '/edit') }}" class="btn" data-bs-toggle="tooltip" data-bs-placement="left" title="Editar">
                            <i class="bi bi-pencil-square" style="color: blue; font-size: 1.5rem"></i>
                        </a>
                        <!-- Botón de Eliminación con Confirmación -->
                        <button type="button" class="btn" onclick="openDeleteModal1({{ $cliente->id_cliente }})" data-bs-toggle="tooltip" data-bs-placement="left" title="Eliminar">
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

  @endsection

      <script>
        function openDeleteModal1(id) {
        var form = document.getElementById('delete-form');
        form.action = 'clientes/' + id;
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
