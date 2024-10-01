@extends('layouts.app')
@extends('layouts.modal')

@section('content')
<hr>
<br>
    <div class="card border-info mx-auto p-2" style="width: 95%;">
        <div class="card header p-3 bg-info bg-opacity-10 border border-info border-start-0 rounded-end">
         <h2 class="text-center">
            <b>
                VUELOS
            </b>
         </h2>
        </div>
        <div class="card-body">
          <h4 class="card-title">Detalles de los vuelos registrados.</h4>
          <div class="text-end">
           <br>
            <hr>
            <table class="table table-striped table-hover">
                <thead class="table-dark">
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
          <tbody class="table-group-divider">
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
                      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ url('vuelos/' . $vuelo->id_vuelo . '/edit') }}" class="btn" data-bs-toggle="tooltip" data-bs-placement="left" title="Editar">
                            <i class="bi bi-pencil-square" style="color: blue; font-size: 1.5rem"></i>
                        </a>
                        <!-- Botón de Eliminación con Confirmación -->
                        <button type="button" class="btn" onclick="openDeleteModal1({{ $vuelo->id_vuelo }})" data-bs-toggle="tooltip" data-bs-placement="left" title="Eliminar">
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
