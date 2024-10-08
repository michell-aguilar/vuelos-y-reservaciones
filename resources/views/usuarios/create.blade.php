@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h2 class="text-center"><b>Registro de Usuario</b></h2>
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
                    
                    <form method="POST" action="{{ url('usuarios') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="nombre" class="form-label"><h5>Nombre Completo:</h5></label>
                            <input type="text" class="form-control" id="nombre" name="nombre" maxlength="50" value="{{ old('nombre') }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="correo" class="form-label"><h5>Correo Electrónico:</h5></label>
                            <input type="email" class="form-control" id="correo" name="correo" value="{{ old('correo') }}" required>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="telefono" class="form-label"><h5>Teléfono Particular:</h5></label>
                            <input type="text" class="form-control" id="telefono" name="telefono" value="{{ old('telefono') }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="fechaRegistro" class="form-label"><h5>Fecha de Registro:</h5></label>
                            <input type="date" class="form-control" id="fechaRegistro" name="fecha_registro" value="{{ old('fecha_registro') }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password_confirmation" class="form-label"><h5>Confirmar Contraseña:</h5></label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
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
