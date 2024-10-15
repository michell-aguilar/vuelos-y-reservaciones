
@extends('layout.app')

@section('title', 'Modificar Reservación')

@section('content')
<h1>Modificar Reservación</h1>
<h5>Formulario para modificar reservación</h5>
<hr>
<form class="row g-3" action="{{ route('reservacion.update', $reservacion->id_reservacion) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="col-md-6">
        <label for="id_usuario" class="form-label">ID Usuario</label>
        <input type="text" name="id_usuario" class="form-control" id="id_usuario" value="{{ $reservacion->id_usuario }}" required>
        @error('id_usuario')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="id_vuelo" class="form-label">ID Vuelo</label>
        <input type="text" name="id_vuelo" class="form-control" id="id_vuelo" value="{{ $reservacion->id_vuelo }}" required>
        @error('id_vuelo')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="cantidad_asientos" class="form-label">Cantidad de Asientos</label>
        <input type="number" name="cantidad_asientos" class="form-control" id="cantidad_asientos" value="{{ $reservacion->cantidad_asientos }}" required>
        @error('cantidad_asientos')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="fecha_reservacion" class="form-label">Fecha de Reservación</label>
        <input type="date" name="fecha_reservacion" class="form-control" id="fecha_reservacion" value="{{ $reservacion->fecha_reservacion }}" required>
        @error('fecha_reservacion')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="estado_reservacion" class="form-label">Estado de Reservación</label>
        <input type="text" name="estado_reservacion" class="form-control" id="estado_reservacion" value="{{ $reservacion->estado_reservacion }}" required>
        @error('estado_reservacion')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
</form>
<br>
@endsection
