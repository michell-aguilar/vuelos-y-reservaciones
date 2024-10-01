@extends('layouts.app')
@extends('layouts.modal')
@section('content')
<hr>
<br>
    <div class="card border-info mx-auto p-2" style="width: 95%;">
        <div class="card header p-3 bg-info bg-opacity-10 border border-info border-start-0 rounded-end">
         <h2 class="text-center">
            <b>
                AEROLÍNEAS
            </b>
         </h2>
        </div>
        <div class="card-body">
          <h4 class="card-title">Detalles de la Aerolínea.</h4>
          <div class="text-end">
           <br>
            <hr>
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">NOMBRE</th>
                      <th scope="col">PAÍS</th>
                      <th scope="col">DIRECCIÓN</th>
                      <th scope="col">AVIONES</th> <!-- Relación con Aviones -->
                      <th scope="col">ACCIONES</th>
                    </tr>
                  </thead>
          <tbody class="table-group-divider">
                <tr>
                    <th scope="row">{{ $aerolinea->id_aerolinea }}</th>
                    <td>{{ $aerolinea->nombre }}</td>
                    <td>{{ $aerolinea->pais }}</td>
                    <td>{{ $aerolinea->direccion_de_ubicacion }}</td>
                    <td>
                        <ul>
                          @foreach ($aerolinea->aviones as $avion)
                            <li>{{ $avion->modelo }} (Capacidad: {{ $avion->capacidad }})</li>
                          @endforeach
                        </ul>
                    </td>
                    <td>
                      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ url('aerolineas/'.$aerolinea->id_aerolinea.'/edit') }}" class="btn" data-bs-toggle="tooltip" data-bs-placement="left" title="Editar"><i class="bi bi-pencil-square" style="color: blue; font-size: 1.5rem"></i></a>
                          <!-- Botón de Eliminación con Confirmación -->
                          <button type="button" class="btn" onclick="openDeleteModal1({{ $aerolinea->id_aerolinea }})" data-bs-toggle="tooltip" data-bs-placement="left" title="Eliminar">
                            <i class="bi bi-trash3" style="font-size: 1.5rem; color: red"></i>
                          </button>
                      </div>
                    </td>
                </tr>
          </tbody> 
      </table>
      </div>
      </div>  
      </div>
@endsection

@section('modal')
<!-- Modal de confirmación para eliminar -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmar Eliminación</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¿Estás seguro de que deseas eliminar esta aerolínea?
      </div>
      <div class="modal-footer">
        <form id="delete-form" method="POST" action="">
          @csrf
          @method('DELETE')
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
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
        form.action = 'aerolineas/' + id;
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
