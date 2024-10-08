@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h2 class="text-center"><b>Registro de Equipaje</b></h2>
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
                    
                    <form method="POST" action="{{ url('equipaje') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="tipoEquipaje" class="form-label"><h5>Tipo de Equipaje:</h5></label>
                            <input type="text" class="form-control" id="tipoEquipaje" name="tipo_equipaje" maxlength="50" value="{{ old('tipo_equipaje') }}" required>
                        </div>
                    
                        <div class="form-group mb-3">
                            <label for="peso" class="form-label"><h5>Peso (kg):</h5></label>
                            <input type="number" class="form-control" id="peso" name="peso" step="0.01" value="{{ old('peso') }}" required>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="dimensiones" class="form-label"><h5>Dimensiones (Largo x Ancho x Alto en cm):</h5></label>
                            <input type="text" class="form-control" id="dimensiones" name="dimensiones" value="{{ old('dimensiones') }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="id_reservacion" class="form-label"><h5>ID de Reservación:</h5></label>
                            <input type="number" class="form-control" id="id_reservacion" name="id_reservacion" value="{{ old('id_reservacion') }}" required>
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
