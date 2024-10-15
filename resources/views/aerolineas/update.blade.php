
@extends('layout.app')
@section('title', 'Actualizar Aerolinea')

@section('content')

<h1>Actualizar Aerolinea</h1>
<h5>Formulario para actualizar aerolinea</h5>
<hr>
<form class="row g-3" action="/aerolinea/update/{{$aerolinea->id_aerolinea}}" method="POST">
    @csrf
    @method('PUT')
    <div class="col-md-6">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" name="nombre" value="{{$aerolinea->nombre}}" class="form-control" id="nombre">
        @error('nombre')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-12">
        <label for="pais" class="form-label">País</label>
        <input type="text" name="pais" value="{{$aerolinea->pais}}" class="form-control" id="pais">
        @error('pais')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-12">
        <label for="direccion_ubicacion" class="form-label">Dirección de Ubicación</label>
        <input type="text" name="direccion_ubicacion" value="{{$aerolinea->direccion_ubicacion}}" class="form-control" id="direccion_ubicacion">
        @error('direccion_ubicacion')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <button class="btn btn-primary">Guardar</button>
</form>

@endsection
