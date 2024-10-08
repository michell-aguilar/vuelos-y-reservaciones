@extends('layouts.app')

@section('content')
<hr>
<br>
<div class="card border-primary mx-auto p-2" style="width: 95%;">
    <div class="card-header">
        <h3>
            <b>
                EDITAR CLIENTE
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
        <form class="row g-3 needs-validation" action="{{ url('clientes/' . $cliente->id_usuario) }}" method="post">
            @method("PUT")
            @csrf
            
            <div class="col-md-6 position-relative">
                <label for="nombre" class="form-label"><h6>Nombre Completo:</h6></label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $cliente->nombre }}" maxlength="50" required>
            </div>
            
            <div class="col-md-6 position-relative">
                <label for="correo" class="form-label"><h6>Correo Electrónico:</h6></label>
                <input type="email" class="form-control" id="correo" name="correo" value="{{ $cliente->correo }}" required>
            </div>
            
            <div class="col-md-6 position-relative">
                <label for="telefono" class="form-label"><h6>Teléfono Particular:</h6></label>
                <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $cliente->telefono }}" required>
            </div>

            <div class="col-md-6 position-relative">
                <label for="fechaRegistro" class="form-label"><h6>Fecha de Registro:</h6></label>
                <input type="date" class="form-control" id="fechaRegistro" name="fecha_registro" value="{{ $cliente->fecha_registro }}" required>
            </div>

            <div class="col-12">
                <button class="btn btn-primary" type="submit">Guardar Cambios</button>
            </div>
        </form>
    </div>
</div>

@endsection
