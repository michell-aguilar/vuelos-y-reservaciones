@extends('layouts.app')

@section('content')
<hr>
<br>
<div class="card border-primary mx-auto p-2" style="width: 95%;">
    <div class="card-header">
        <h3>
            <b>
                EDITAR EQUIPAJE
            </b>
        </h3>
    </div>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <div class="card-body">
        <form class="row g-3 needs-validation" action="{{ url('equipaje/' . $equipaje->id_equipaje) }}" method="post">
            @method("PUT")
            @csrf
            
            <div class="col-md-6 position-relative">
                <label for="id_usuario" class="form-label"><h6>ID de Usuario:</h6></label>
                <input type="text" class="form-control" id="id_usuario" name="id_usuario" value="{{ $equipaje->id_usuario }}" required>
            </div>

            <div class="col-md-6 position-relative">
                <label for="peso" class="form-label"><h6>Peso del Equipaje (kg):</h6></label>
                <input type="number" class="form-control" id="peso" name="peso" value="{{ $equipaje->peso }}" required>
            </div>

            <div class="col-md-6 position-relative">
                <label for="tipo_equipaje" class="form-label"><h6>Tipo de Equipaje:</h6></label>
                <input type="text" class="form-control" id="tipo_equipaje" name="tipo_equipaje" value="{{ $equipaje->tipo_equipaje }}" required>
            </div>

            

            <div class="col-12">
                <button class="btn btn-primary" type="submit">Guardar Cambios</button>
            </div>
        </form>
    </div>
</div>

@endsection
