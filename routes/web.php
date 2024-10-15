<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VueloController;
use App\Http\Controllers\ReservacionController;
use App\Http\Controllers\AerolineaController;
use App\Http\Controllers\AvionController;
use App\Http\Controllers\EquipajeController;
use App\Http\Controllers\PagoController;



Route::get('/home', function () { return view('home');
})->middleware('auth');

Route::resource('/usuarios', UsuarioController::class);

Route::resource('/clientes', ClienteController::class);

Route::resource('/vuelos', VueloController::class);

Route::resource('/reservaciones', ReservacionController::class);

Route::resource('/pagos', PagoController::class);

Route::resource('/aerolineas', AerolineaController::class);

Route::resource('/aviones', AvionController::class);

Route::resource('/equipajes', EquipajeController::class);



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


