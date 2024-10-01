@extends('layouts.app')

@section('content')
<hr>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-info py-3 px-4" style="width: 45rem;">

                <div class="card-header">
                    <h1><b>{{ __('Restablecer Contraseña') }}</b></h1>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row-mb-3">
                            <label for="email" class="col-mb-3 col-form-label text-md-left">
                                <h5><b>{{ __('Dirección de correo electrónico') }}</b></h5></label>
                            <div class="col-md-7">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="row-mb-3">
                            <div class="d-grid gap-2 col-6 mx-left offset-md">
                                <button type="submit" class="btn btn-dark">
                                    <h5><b>{{ __('Enviar enlace para restablecer contraseña') }}</b></h5>
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
