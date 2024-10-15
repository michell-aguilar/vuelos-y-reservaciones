<?php

namespace App\Http\Controllers;

use App\Models\Reservacion;
use Illuminate\Http\Request;

class ReservacionController extends Controller
{
    public function index()
    {
        $reservaciones = Reservacion::with('usuario', 'vuelo')->get();
        return view('reservaciones.show')->with(['reservaciones' => $reservaciones]);
    }

    public function create()
    {
        return view('reservaciones.create');
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'id_usuario' => 'required|exists:usuarios,id_usuario',
            'id_vuelo' => 'required|exists:vuelos,id_vuelo',
            'cantidad_asientos' => 'required|integer',
            'fecha_reservacion' => 'required|date',
            'estado_reservacion' => 'required|string',
        ]);

        Reservacion::create($data);
        return redirect('/reservaciones/show');
    }

    public function show(Reservacion $reservacion)
    {
        return view('reservaciones.show_single')->with(['reservacion' => $reservacion]);
    }

    public function edit(Reservacion $reservacion)
    {
        return view('reservaciones.edit')->with(['reservacion' => $reservacion]);
    }

    public function update(Request $request, Reservacion $reservacion)
    {
        $data = request()->validate([
            'id_usuario' => 'required|exists:usuarios,id_usuario',
            'id_vuelo' => 'required|exists:vuelos,id_vuelo',
            'cantidad_asientos' => 'required|integer',
            'fecha_reservacion' => 'required|date',
            'estado_reservacion' => 'required|string',
        ]);

        $reservacion->update($data);
        return redirect('/reservaciones/show');
    }

    public function destroy(Reservacion $reservacion)
    {
        $reservacion->delete();
        return response()->json(['res' => true]);
    }
}
