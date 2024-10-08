@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h2 class="text-center"><b>Registro de Pago</b></h2>
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
                    
                    <form method="POST" action="{{ url('pagos') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="id_reservacion" class="form-label"><h5>ID de Reservación:</h5></label>
                            <input type="number" class="form-control" id="id_reservacion" name="id_reservacion" value="{{ old('id_reservacion') }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="monto" class="form-label"><h5>Monto:</h5></label>
                            <input type="number" class="form-control" id="monto" name="monto" step="0.01" value="{{ old('monto') }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="fecha_pago" class="form-label"><h5>Fecha de Pago:</h5></label>
                            <input type="date" class="form-control" id="fecha_pago" name="fecha_pago" value="{{ old('fecha_pago') }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="metodo_pago" class="form-label"><h5>Método de Pago:</h5></label>
                            <select class="form-control" id="metodo_pago" name="metodo_pago" required>
                                <option value="" disabled selected>Selecciona un método</option>
                                <option value="tarjeta">Tarjeta de Crédito/Débito</option>
                                <option value="efectivo">Efectivo</option>
                                <option value="transferencia">Transferencia Bancaria</option>
                                <option value="otro">Otro</option>
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
