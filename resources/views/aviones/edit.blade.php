@extends('layouts.app')

@section('content')
<hr>
<br>
<div class="card border-danger mx-auto p-2" style="width: 95%;">
    <div class="card-header">
        <h3>
            <b>
                EDITAR AVIÓN
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
        <form class="row g-3 needs-validation" action="{{ url('aviones/' . $avion->id) }}" method="post">
            @method("PUT")
            @csrf
            
            <div class="col-md-4 position-relative">
                <label for="modelo" class="form-label"><h6>Modelo:</h6></label>
                <input type="text" class="form-control" id="modelo" name="modelo" value="{{ $avion->modelo }}" maxlength="100" required>
            </div>
            
        
            <div class="col-md-4 position-relative">
                <label for="capacidad" class="form-label"><h6>Capacidad de Pasajeros:</h6></label>
                <input type="number" class="form-control" id="capacidad" name="capacidad" value="{{ $avion->capacidad }}" required>
            </div>
            
            
            <div class="col-12">
                <button class="btn btn-dark" type="submit">Guardar Cambios</button>
            </div>
        </form>
    </div>
</div>

@endsection
