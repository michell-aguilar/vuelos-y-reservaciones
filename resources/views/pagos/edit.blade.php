@extends('layouts.app')

@section('content')
<hr>
<br>
<div class="card border-primary mx-auto p-2" style="width: 95%;">
    <div class="card-header">
        <h3>
            <b>
                EDITAR PAGO
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
        <form class="row g-3 needs-validation" action="{{ url('pagos/' . $pago->id_pago) }}" method="post">
            @method("PUT")
            @csrf
            
            <div class="col-md-6 position-relative">
                <label for="id_reservacion" class="form-label"><h6>ID de Reservación:</h6></label>
                <input type="text" class="form-control" id="id_reservacion" name="id_reservacion" value="{{ $pago->id_reservacion }}" required>
            </div>

            <div class="col-md-6 position-relative">
                <label for="monto" class="form-label"><h6>Monto:</h6></label>
                <input type="number" class="form-control" id="monto" name="monto" value="{{ $pago->monto }}" required>
            </div>

            <div class="col-md-6 position-relative">
                <label for="fecha_pago" class="form-label"><h6>Fecha de Pago:</h6></label>
                <input type="date" class="form-control" id="fecha_pago" name="fecha_pago" value="{{ $pago->fecha_pago }}" required>
            </div>

            <div class="col-md-6 position-relative">
                <label for="metodo_pago" class="form-label"><h6>Método de Pago:</h6></label>
                <select class="form-select" id="metodo_pago" name="metodo_pago" required>
                    <option value="Tarjeta de Crédito" {{ $pago->metodo_pago == 'Tarjeta de Crédito' ? 'selected' : '' }}>Tarjeta de Crédito</option>
                    <option value="Transferencia Bancaria" {{ $pago->metodo_pago == 'Transferencia Bancaria' ? 'selected' : '' }}>Transferencia Bancaria</option>
                    <option value="Efectivo" {{ $pago->metodo_pago == 'Efectivo' ? 'selected' : '' }}>Efectivo</option>
                </select>
            </div>

            <div class="col-12">
                <button class="btn btn-primary" type="submit">Guardar Cambios</button>
            </div>
        </form>
    </div>
</div>

@endsection
