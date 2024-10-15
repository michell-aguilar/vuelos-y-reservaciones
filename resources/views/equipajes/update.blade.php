
@extends('layout.app')

@section('title', 'Modificar Equipaje')

@section('content')
<h1>Modificar Equipaje</h1>
<h5>Formulario para modificar equipaje</h5>
<hr>
<form class="row g-3" action="{{ route('equipaje.update', $equipaje->id_equipaje) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="col-md-6">
        <label for="id_cliente" class="form-label">ID Cliente</label>
        <input type="text" name="id_cliente" class="form-control" id="id_cliente" value="{{ $equipaje->id_cliente }}" required>
        @error('id_cliente')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="id_vuelo" class="form-label">ID Vuelo</label>
        <input type="text" name="id_vuelo" class="form-control" id="id_vuelo" value="{{ $equipaje->id_vuelo }}" required>
        @error('id_vuelo')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="peso" class="form-label">Peso (kg)</label>
        <input type="number" name="peso" class="form-control" id="peso" value="{{ $equipaje->peso }}" required>
        @error('peso')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="dimensiones" class="form-label">Dimensiones (cm)</label>
        <input type="text" name="dimensiones" class="form-control" id="dimensiones" value="{{ $equipaje->dimensiones }}" required>
        @error('dimensiones')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="cantidad" class="form-label">Cantidad</label>
        <input type="number" name="cantidad" class="form-control" id="cantidad" value="{{ $equipaje->cantidad }}" required>
        @error('cantidad')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="tipo" class="form-label">Tipo</label>
        <input type="text" name="tipo" class="form-control" id="tipo" value="{{ $equipaje->tipo }}" required>
        @error('tipo')
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
