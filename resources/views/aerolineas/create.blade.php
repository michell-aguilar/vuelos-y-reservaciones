@extends('layouts.app')
 
@section('content')
<div class="container">
    <h1>Agregar Nueva Aerolínea</h1>
    
    <form action="{{ route('aerolineas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre de la Aerolínea</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>
 
        <div class="form-group mt-3">
            <label for="codigo">Código de la Aerolínea</label>
            <input type="text" name="codigo" id="codigo" class="form-control" required>
        </div>
 
        <button type="submit" class="btn btn-success mt-4">Guardar</button>
        <a href="{{ route('aerolineas.index') }}" class="btn btn-secondary mt-4">Cancelar</a>
    </form>
</div>
@endsection