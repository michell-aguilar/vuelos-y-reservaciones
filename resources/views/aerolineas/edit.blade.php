@extends('layouts.app')
 
@section('content')
<div class="container">
    <h1>Editar Aerolínea</h1>
    
    <form action="{{ route('aerolineas.update', $aerolinea->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="nombre">Nombre de la Aerolínea</label>
            <input type="text" name="nombre" id="nombre" value="{{ $aerolinea->nombre }}" class="form-control" required>
        </div>
 
        <div class="form-group mt-3">
            <label for="codigo">Código de la Aerolínea</label>
            <input type="text" name="codigo" id="codigo" value="{{ $aerolinea->codigo }}" class="form-control" required>
        </div>
 
        <button type="submit" class="btn btn-primary mt-4">Actualizar</button>
        <a href="{{ route('aerolineas.index') }}" class="btn btn-secondary mt-4">Cancelar</a>
    </form>
</div>
@endsection