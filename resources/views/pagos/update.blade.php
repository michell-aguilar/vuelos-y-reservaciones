
@extends('layout.app')

@section('title', 'Modificar Pago')

@section('content')
<h1>Modificar Pago</h1>
<h5>Formulario para modificar pago</h5>
<hr>
<form class="row g-3" action="{{ route('pago.update', $pago->id_pago) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="col-md-6">
        <label for="id_reservacion" class="form-label">ID Reservación</label>
        <input type="text" name="id_reservacion" class="form-control" id="id_reservacion" value="{{ $pago->id_reservacion }}" required>
        @error('id_reservacion')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="monto" class="form-label">Monto</label>
        <input type="number" name="monto" class="form-control" id="monto" value="{{ $pago->monto }}" required>
        @error('monto')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="fecha_pago" class="form-label">Fecha de Pago</label>
        <input type="date" name="fecha_pago" class="form-control" id="fecha_pago" value="{{ $pago->fecha_pago }}" required>
        @error('fecha_pago')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="metodo_pago" class="form-label">Método de Pago</label>
        <input type="text" name="metodo_pago" class="form-control" id="metodo_pago" value="{{ $pago->metodo_pago }}" required>
        @error('metodo_pago')
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
