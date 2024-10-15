{{-- Heredemos la estructura del archivo app.blade.php --}}

@extends('layout.app')

{{-- Definimos el título --}}
@section('title', 'Actualizar Avion')

{{-- Definimos el contenido --}}
@section('content')

<h1>Actualizar Avion</h1>
<h5>Formulario para actualizar avion</h5>
<hr>
<form class="row g-3" action="/avion/update/{{$avion->id_avion}}" method="POST">
    @csrf
    @method('PUT')
    <div class="col-md-6">
        <label for="modelo" class="form-label">Modelo</label>
        <input type="text" name="modelo" value="{{$avion->modelo}}" class="form-control" id="modelo">
        @error('modelo')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-12">
        <label for="capacidad" class="form-label">Capacidad</label>
        <input type="number" name="capacidad" value="{{$avion->capacidad}}" class="form-control" id="capacidad">
        @error('capacidad')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-12">
        <label for="aerolinea_id" class="form-label">Aerolinea</label>
        <select name="aerolinea_id" class="form-select" id="aerolinea_id">
            @foreach($aerolineas as $item)
            <option value="{{ $item->id_aerolinea }}" {{ ($item->id_aerolinea == $avion->aerolinea_id) ? 'selected' : '' }}>{{ $item->nombre }}</option>
            @endforeach
        </select>
        @error('aerolinea_id')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <button class="btn btn-primary">Guardar</button>
</form>

@endsection
