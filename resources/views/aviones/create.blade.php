@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h2 class="text-center"><b>Registro de Avión</b></h2>
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
                    
                    <form method="POST" action="{{ url('aviones') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="modelo" class="form-label"><h5>Modelo:</h5></label>
                            <input type="text" class="form-control" id="modelo" name="modelo" maxlength="100" value="{{ old('modelo') }}" required>
                        </div>

                        
                        <div class="form-group mb-3">
                            <label for="capacidad" class="form-label"><h5>Capacidad de Pasajeros:</h5></label>
                            <input type="number" class="form-control" id="capacidad" name="capacidad" value="{{ old('capacidad') }}" required>
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
