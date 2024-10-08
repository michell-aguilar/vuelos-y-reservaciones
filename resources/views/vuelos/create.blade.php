@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h2 class="text-center"><b>Registro de Vuelo</b></h2>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ url('vuelos') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="origen" class="form-label"><h5>Origen:</h5></label>
                            <input type="text" class="form-control" id="origen" name="origen" maxlength="100" value="{{ old('origen') }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="destino" class="form-label"><h5>Destino:</h5></label>
                            <input type="text" class="form-control" id="destino" name="destino" maxlength="100" value="{{ old('destino') }}" required>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="fecha_salida" class="form-label"><h5>Fecha de Salida:</h5></label>
                            <input type="date" class="form-control" id="fecha_salida" name="fecha_salida" value="{{ old('fecha_salida') }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="hora_salida" class="form-label"><h5>Hora de Salida:</h5></label>
                            <input type="time" class="form-control" id="hora_salida" name="hora_salida" value="{{ old('hora_salida') }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="fecha_llegada" class="form-label"><h5>Fecha de Llegada:</h5></label>
                            <input type="date" class="form-control" id="fecha_llegada" name="fecha_llegada" value="{{ old('fecha_llegada') }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="hora_llegada" class="form-label"><h5>Hora de Llegada:</h5></label>
                            <input type="time" class="form-control" id="hora_llegada" name="hora_llegada" value="{{ old('hora_llegada') }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="precio" class="form-label"><h5>Precio:</h5></label>
                            <input type="number" class="form-control" id="precio" name="precio" step="0.01" value="{{ old('precio') }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="estado_vuelo" class="form-label"><h5>Estado del Vuelo:</h5></label>
                            <select class="form-control" id="estado_vuelo" name="estado_vuelo" required>
                                <option value="" disabled selected>Selecciona un estado</option>
                                <option value="disponible">Disponible</option>
                                <option value="no_disponible">No Disponible</option>
                                <option value="cancelado">Cancelado</option>
                            </select>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-primary btn-lg" type="submit"><b>Guardar</b></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
