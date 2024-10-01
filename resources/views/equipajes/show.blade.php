@extends('layouts.app')
@extends('layouts.modal')

@section('content')
<hr>
<br>
    <div class="card border-info mx-auto p-2" style="width: 95%;">
        <div class="card header p-3 bg-info bg-opacity-10 border border-info border-start-0 rounded-end">
         <h2 class="text-center">
            <b>
                EQUIPAJE
            </b>
         </h2>
        </div>
        <div class="card-body">
          <h4 class="card-title">Detalles del equipaje registrado.</h4>
          <div class="text-end">
           <br>
            <hr>
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">CLIENTE</th>
                      <th scope="col">VUELO</th>
                      <th scope="col">PESO</th>
                      <th scope="col">DIMENSIONES</th>
                      <th scope="col">CANTIDAD</th>
                      <th scope="col">TIPO</th>
                      <th scope="col">ACCIONES</th>
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
                            <i class="bi bi-pencil-square" style="color: blue; font-size: 1.5rem"></i>
                        </a>
                        <!-- Botón de Eliminación con Confirmación -->
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
