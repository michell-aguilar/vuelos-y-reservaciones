{{-- Heredemos la estructura del archivo app.blade.php --}}
@extends('layout.app')

{{-- Definimos el título --}}
@section('title', 'Modificar Cliente')

{{-- Definimos el contenido --}}
@section('content')
<h1>Modificar Cliente</h1>
<h5>Formulario para modificar cliente</h5>
<hr>
<form class="row g-3" action="{{ route('cliente.update', $cliente->id_cliente) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="col-md-6">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control" id="nombre" value="{{ $cliente->nombre }}" required>
        @error('nombre')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="correo" class="form-label">Correo</label>
        <input type="email" name="correo" class="form-control" id="correo" value="{{ $cliente->correo }}" required>
        @error('correo')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="telefono" class="form-label">Teléfono</label>
        <input type="text" name="telefono" class="form-control" id="telefono" value="{{ $cliente->telefono }}" required>
        @error('telefono')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="fecha_registro" class="form-label">Fecha de Registro</label>
        <input type="date" name="fecha_registro" class="form-control" id="fecha_registro" value="{{ $cliente->fecha_registro }}" required>
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
<br>
@endsection
