@extends('layouts.app')

@section('content')
<hr>
<br>
<div class="card border-primary mx-auto p-2" style="width: 95%;">
    <div class="card-header">
        <h3>
            <b>
                EDITAR RESERVACIÓN
            </b>
        </h3>
    </div>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <div class="card-body">
        <form class="row g-3 needs-validation" action="{{ url('reservaciones/' . $reservacion->id_reservacion) }}" method="post">
            @method("PUT")
            @csrf
            
            <div class="col-md-6 position-relative">
                <label for="id_usuario" class="form-label"><h6>ID de Usuario:</h6></label>
                <input type="text" class="form-control" id="id_usuario" name="id_usuario" value="{{ $reservacion->id_usuario }}" required>
            </div>

            <div class="col-md-6 position-relative">
                <label for="id_vuelo" class="form-label"><h6>ID de Vuelo:</h6></label>
                <input type="text" class="form-control" id="id_vuelo" name="id_vuelo" value="{{ $reservacion->id_vuelo }}" required>
            </div>

            <div class="col-md-6 position-relative">
                <label for="cantidad_asientos" class="form-label"><h6>Cantidad de Asientos:</h6></label>
                <input type="number" class="form-control" id="cantidad_asientos" name="cantidad_asientos" value="{{ $reservacion->cantidad_asientos }}" required>
            </div>

            <div class="col-md-6 position-relative">
                <label for="fecha_reservacion" class="form-label"><h6>Fecha de Reservación:</h6></label>
                <input type="date" class="form-control" id="fecha_reservacion" name="fecha_reservacion" value="{{ $reservacion->fecha_reservacion }}" required>
            </div>

            <div class="col-md-6 position-relative">
                <label for="estado_reservacion" class="form-label"><h6>Estado de Reservación:</h6></label>
                <select class="form-select" id="estado_reservacion" name="estado_reservacion" required>
                    <option value="Confirmada" {{ $reservacion->estado_reservacion == 'Confirmada' ? 'selected' : '' }}>Confirmada</option>
                    <option value="Cancelada" {{ $reservacion->estado_reservacion == 'Cancelada' ? 'selected' : '' }}>Cancelada</option>
                    <option value="Pendiente" {{ $reservacion->estado_reservacion == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                </select>
            </div>

            <div class="col-12">
                <button class="btn btn-primary" type="submit">Guardar Cambios</button>
            </div>
        </form>
    </div>
</div>

@endsection
