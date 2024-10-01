<?php

namespace App\Http\Controllers;

use App\Models\Reservaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservacionesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $reservaciones = Reservaciones::all();
        return view('reservaciones.show', ['reservaciones' => $reservaciones]);
    }

    public function create()
    {
        return view('reservaciones.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_usuario' => 'required|exists:usuarios,id',
            'id_vuelo' => 'required|exists:vuelos,id',
            'cantidad_asientos' => 'required|integer|min:1',
            'fecha_reservacion' => 'required|date',
            'estado_reservacion' => 'required|string',
        ]);

        $reservacion = new Reservaciones();
        $reservacion->id_usuario = $request->input('id_usuario');
        $reservacion->id_vuelo = $request->input('id_vuelo');
        $reservacion->cantidad_asientos = $request->input('cantidad_asientos');
        $reservacion->fecha_reservacion = $request->input('fecha_reservacion');
        $reservacion->estado_reservacion = $request->input('estado_reservacion');
        $reservacion->save();

        return redirect()->route('reservaciones.index');
    }

    public function show(Reservaciones $reservaciones)
    {
        return view('reservaciones.show_single', ['reservacion' => $reservaciones]);
    }

    public function edit($id)
    {
        $reservacion = Reservaciones::find($id);
        return view('reservaciones.edit', ['reservacion' => $reservacion]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'cantidad_asientos' => 'required|integer|min:1',
            'estado_reservacion' => 'required|string',
        ]);

        $reservacion = Reservaciones::find($id);
        $reservacion->cantidad_asientos = $request->input('cantidad_asientos');
        $reservacion->estado_reservacion = $request->input('estado_reservacion');
        $reservacion->save();

        return redirect()->route('reservaciones.index');
    }

    public function destroy($id)
    {
        $reservacion = Reservaciones::find($id);
        $reservacion->delete();

        return redirect()->route('reservaciones.index');
    }
}
