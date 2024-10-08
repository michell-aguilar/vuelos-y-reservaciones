@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h2 class="text-center"><b>Registro de Reservación</b></h2>
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
                    
                    <form method="POST" action="{{ url('reservaciones') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="id_usuario" class="form-label"><h5>ID de Usuario:</h5></label>
                            <input type="number" class="form-control" id="id_usuario" name="id_usuario" value="{{ old('id_usuario') }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="id_vuelo" class="form-label"><h5>ID de Vuelo:</h5></label>
                            <input type="number" class="form-control" id="id_vuelo" name="id_vuelo" value="{{ old('id_vuelo') }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="cantidad_asientos" class="form-label"><h5>Cantidad de Asientos:</h5></label>
                            <input type="number" class="form-control" id="cantidad_asientos" name="cantidad_asientos" value="{{ old('cantidad_asientos') }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="fecha_reservacion" class="form-label"><h5>Fecha de Reservación:</h5></label>
                            <input type="date" class="form-control" id="fecha_reservacion" name="fecha_reservacion" value="{{ old('fecha_reservacion') }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="estado_reservacion" class="form-label"><h5>Estado de la Reservación:</h5></label>
                            <select class="form-control" id="estado_reservacion" name="estado_reservacion" required>
                                <option value="" disabled selected>Selecciona el estado</option>
                                <option value="confirmada">Confirmada</option>
                                <option value="pendiente">Pendiente</option>
                                <option value="cancelada">Cancelada</option>
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
