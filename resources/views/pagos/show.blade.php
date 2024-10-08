@extends('layouts.app')
@extends('layouts.modal')

@section('content')
<hr>
<br>
<div class="container mt-4">
  <div class="card border-info mx-auto p-2" style="width: 95%;">
      <div class="card-header p-3" style="background-color: #ffcccb; border-color: #ff99cc;" class="border border-info rounded-end">
          <h2 class="text-center text-info">
              <b>PAGOS</b>
          </h2>
      </div>
      <div class="card-body">
          <h4 class="card-title">Detalles de los pagos registrados.</h4>
          <div class="text-end mb-3">
              <a href="{{ url('pagos/create') }}" class="btn btn-success">Registrar pago</a>
          </div>
          <table class="table table-striped table-hover">
              <thead style="background-color: white;">
                  <tr>
                      <th scope="col" class="text-pink">ID</th>
                      <th scope="col" class="text-pink">RESERVACIÓN</th>
                      <th scope="col" class="text-pink">MONTO</th>
                      <th scope="col" class="text-pink">FECHA DE PAGO</th>
                      <th scope="col" class="text-pink">MÉTODO DE PAGO</th>
                      <th scope="col" class="text-pink">ACCIONES</th>
                  </tr>
              </thead>
              <tbody class="table-group-divider">
                  @foreach ($pagos as $pago)
                      <tr>
                          <th scope="row">{{ $pago->id_pago }}</th>
                          <td>{{ $pago->reservacion->id_reservacion }}</td>
                          <td>{{ number_format($pago->monto, 2) }} $</td>
                          <td>{{ \Carbon\Carbon::parse($pago->fecha_pago)->format('d-m-Y') }}</td>
                          <td>{{ $pago->metodo_pago }}</td>
                          <td>
                              <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                  <a href="{{ url('pagos/' . $pago->id_pago . '/edit') }}" class="btn" data-bs-toggle="tooltip" data-bs-placement="left" title="Editar">
                                      <i class="bi bi-pencil-square" style="color: blue; font-size: 1.5rem"></i>
                                  </a>
                                  <!-- Botón de Eliminación con Confirmación -->
                                  <button type="button" class="btn" onclick="openDeleteModal1({{ $pago->id_pago }})" data-bs-toggle="tooltip" data-bs-placement="left" title="Eliminar">
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
              ¿Estás seguro de que deseas eliminar este pago?
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
      form.action = 'pagos/' + id;
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
