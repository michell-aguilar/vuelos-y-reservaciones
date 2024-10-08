@extends('layouts.app')

@section('content')
<hr>
<br>
<div class="card border-primary mx-auto p-2" style="width: 95%;">
    <div class="card-header">
        <h3>
            <b>
                EDITAR VUELO
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
        <form class="row g-3 needs-validation" action="{{ url('vuelos/' . $vuelo->id_vuelo) }}" method="post">
            @method("PUT")
            @csrf
            
            <div class="col-md-4 position-relative">
                <label for="origen" class="form-label"><h6>Origen:</h6></label>
                <input type="text" class="form-control" id="origen" name="origen" value="{{ $vuelo->origen }}" required>
            </div>
            
            <div class="col-md-4 position-relative">
                <label for="destino" class="form-label"><h6>Destino:</h6></label>
                <input type="text" class="form-control" id="destino" name="destino" value="{{ $vuelo->destino }}" required>
            </div>
            
            <div class="col-md-4 position-relative">
                <label for="fecha_salida" class="form-label"><h6>Fecha de Salida:</h6></label>
                <input type="date" class="form-control" id="fecha_salida" name="fecha_salida" value="{{ $vuelo->fecha_salida }}" required>
            </div>
            
            <div class="col-md-4 position-relative">
                <label for="hora_salida" class="form-label"><h6>Hora de Salida:</h6></label>
                <input type="time" class="form-control" id="hora_salida" name="hora_salida" value="{{ $vuelo->hora_salida }}" required>
            </div>
            
            <div class="col-md-4 position-relative">
                <label for="fecha_llegada" class="form-label"><h6>Fecha de Llegada:</h6></label>
                <input type="date" class="form-control" id="fecha_llegada" name="fecha_llegada" value="{{ $vuelo->fecha_llegada }}" required>
            </div>
            
            <div class="col-md-4 position-relative">
                <label for="hora_llegada" class="form-label"><h6>Hora de Llegada:</h6></label>
                <input type="time" class="form-control" id="hora_llegada" name="hora_llegada" value="{{ $vuelo->hora_llegada }}" required>
            </div>
            
            <div class="col-md-4 position-relative">
                <label for="precio" class="form-label"><h6>Precio:</h6></label>
                <input type="number" class="form-control" id="precio" name="precio" value="{{ $vuelo->precio }}" required>
            </div>
            
            <div class="col-md-4 position-relative">
                <label for="estado_vuelo" class="form-label"><h6>Estado del Vuelo:</h6></label>
                <select class="form-select" id="estado_vuelo" name="estado_vuelo" required>
                    <option value="Disponible" {{ $vuelo->estado_vuelo == 'Disponible' ? 'selected' : '' }}>Disponible</option>
                    <option value="No Disponible" {{ $vuelo->estado_vuelo == 'No Disponible' ? 'selected' : '' }}>No Disponible</option>
                </select>
            </div>

            <div class="col-12">
                <button class="btn btn-primary" type="submit">Guardar Cambios</button>
            </div>
        </form>
    </div>
</div>

@endsection
