@extends('layouts.app')
@section('title','Vuelos_Reservaciones')
@section('content')
<hr>
<center>
    <br>
    <div class="card border-primary py-3 px-4" style="width: 950px;">
        <div class="card-header">
            <h1> REGISTRO DE VUELOS Y RESERVACIONES</h1>
        </div>
         <div class="card-body">
        <blockquote class="blockquote mb-10">
            <h2>Bienvenido: {{ Auth::user()->name }}</h2>
            <img src="{{ asset('img/logo1.png') }}" class="card-img-top" alt="PE" style="max-width: 30%; height: auto;">
        </div>
        </blockquote>
        </div>
    </div>
</center>
@endsection