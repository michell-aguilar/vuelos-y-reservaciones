
@extends('layout.app')

@section('title', 'Crear Cliente')

@section('content')
<h1>Crear Cliente</h1>
<h5>Formulario para crear cliente</h5>
<hr>
<form class="row g-3" action="{{ route('cliente.store') }}" method="POST">
    @csrf
    <div class="col-md-6">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control" id="nombre" required>
        @error('nombre')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="correo" class="form-label">Correo</label>
        <input type="email" name="correo" class="form-control" id="correo" required>
        @error('correo')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="telefono" class="form-label">Teléfono</label>
        <input type="text" name="telefono" class="form-control" id="telefono" required>
        @error('telefono')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="fecha_registro" class="form-label">Fecha de Registro</label>
        <input type="date" name="fecha_registro" class="form-control" id="fecha_registro" required>
        @error('fecha_registro')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</form>
<br>
@endsection
