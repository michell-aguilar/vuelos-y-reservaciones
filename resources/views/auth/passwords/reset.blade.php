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
                    <h1><b>{{ __('Restablecer Contraseña') }}</b></h1>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row-mb-3">
                            <label for="email" class="col-mb-3 col-form-label text-md-left"><h5><b>{{ __('Dirección de correo electrónico') }}</b></h5></label>
                            <div class="col-md-7">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="row-mb-3">
                            <label for="password" class="col-mb-3 col-form-label text-md-left"><h5><b>{{ __('Contraseña') }}</b></h5></label>
                            <div class="col-md-7">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="row-mb-3">
                            <label for="password-confirm" class="col-mb-3 col-form-label text-md-left"><h5><b>{{ __('Confirmar Contraseña') }}</b></h5></label>
                            <div class="col-md-7">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <br>
                        <div class="row-mb-3">
                            <div class="d-grid gap-2 col-6 mx-left offset-md">
                                <button type="submit" class="btn btn-dark">
                                    <h5><b>{{ __('Restablecer Contraseña') }}</b></h5>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
