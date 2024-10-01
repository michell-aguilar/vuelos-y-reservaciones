@extends('layouts.app')

@section('content')
<hr>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-info py-3 px-4" style="width: 45rem;">

                <div class="card-header text-center">
                    <img src="{{ asset('img/logo1.png') }}" class="card-img-top" alt="PE" style="max-width: 15%; height: auto;">
                    <h1><b>{{ __('Verifique su dirección de correo electrónico') }}</b></h1>
                </div>
                
                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Se ha enviado un nuevo enlace de verificación a su dirección de correo electrónico.') }}
                        </div>
                    @endif

                    <p>{{ __('Antes de continuar, por favor revise su correo electrónico para encontrar un enlace de verificación.') }}</p>
                    <p>{{ __('Si no recibió el correo electrónico') }}, 
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('haga clic aquí para solicitar otro') }}</button>.
                        </form>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
