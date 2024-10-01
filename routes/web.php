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

Route::get('/home', function(){  return view(home);});
// Rutas de Usuarios
Route::resource('/usuarios', UsuarioController::class);

// Rutas de Clientes
Route::resource('/clientes', ClienteController::class);

// Rutas de Vuelos
Route::resource('/vuelos', VueloController::class);

// Rutas de Reservaciones
Route::resource('/reservaciones', ReservacionController::class);

// Rutas de Pagos

Route::resource('/pagos', PagoController::class);


// Rutas de Aerolíneas
Route::resource('/aerolineas', AerolineaController::class);

// Rutas de Aviones
Route::resource('/aviones', AvionController::class);

// Rutas de Equipaje
Route::resource('/equipajes', EquipajeController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


