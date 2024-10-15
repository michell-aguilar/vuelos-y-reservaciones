
@extends('layout.app')

@section('title', 'Modificar Usuario')

@section('content')
<h1>Modificar Usuario</h1>
<h5>Formulario para modificar usuario</h5>
<hr>
<form class="row g-3" action="{{ route('usuario.update', $usuario->id_usuario) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="col-md-6">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control" id="nombre" value="{{ $usuario->nombre }}" required>
        @error('nombre')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="correo" class="form-label">Correo</label>
        <input type="email" name="correo" class="form-control" id="correo" value="{{ $usuario->correo }}" required>
        @error('correo')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="telefono" class="form-label">Teléfono</label>
        <input type="text" name="telefono" class="form-control" id="telefono" value="{{ $usuario->telefono }}" required>
        @error('telefono')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="fecha_registro" class="form-label">Fecha de Registro</label>
        <input type="date" name="fecha_registro" class="form-control" id="fecha_registro" value="{{ $usuario->fecha_registro }}" required>
        @error('fecha_registro')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
</form>
@endsection
