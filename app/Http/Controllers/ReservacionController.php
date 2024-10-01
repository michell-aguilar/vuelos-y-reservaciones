<?php

namespace App\Http\Controllers;

use App\Models\Reservacion;
use App\Models\Vuelo;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ReservacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $reservaciones = Reservacion::with('vuelo', 'cliente')
            ->orderBy('id_reservacion', 'desc')
            ->get();

        return view('reservaciones.show', ['reservaciones' => $reservaciones]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reservaciones.create', [
            'vuelos' => Vuelo::all(),
            'clientes' => Cliente::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_cliente' => 'required',
            'id_vuelo' => 'required',
            'cantidad_asientos' => 'required|integer|min:1',
            'fecha_reservacion' => 'required|date',
            'estado_reservacion' => 'required|string',
        ]);

        $reservacion = new Reservacion();
        $reservacion->id_cliente = $request->input('id_cliente');
        $reservacion->id_vuelo = $request->input('id_vuelo');
        $reservacion->cantidad_asientos = $request->input('cantidad_asientos');
        $reservacion->fecha_reservacion = $request->input('fecha_reservacion');
        $reservacion->estado_reservacion = $request->input('estado_reservacion');

        $reservacion->save();
        return redirect("reservaciones");
    }

    /**
     * Display the specified resource.
     */
    public function show($id_reservacion)
    {
        $reservacion = Reservacion::with('vuelo', 'cliente')->find($id_reservacion);
        return view('reservaciones.show', ['reservacion' => $reservacion]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_reservacion)
    {
        $reservacion = Reservacion::find($id_reservacion);
        return view('reservaciones.edit', [
            'reservacion' => $reservacion,
            'vuelos' => Vuelo::all(),
            'clientes' => Cliente::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_reservacion)
    {
        $request->validate([
            'id_cliente' => 'required',
            'id_vuelo' => 'required',
            'cantidad_asientos' => 'required|integer|min:1',
            'fecha_reservacion' => 'required|date',
            'estado_reservacion' => 'required|string',
        ]);

        $reservacion = Reservacion::find($id_reservacion);
        $reservacion->id_cliente = $request->input('id_cliente');
        $reservacion->id_vuelo = $request->input('id_vuelo');
        $reservacion->cantidad_asientos = $request->input('cantidad_asientos');
        $reservacion->fecha_reservacion = $request->input('fecha_reservacion');
        $reservacion->estado_reservacion = $request->input('estado_reservacion');

        $reservacion->save();
        return redirect("reservaciones");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_reservacion)
    {
        $reservacion = Reservacion::find($id_reservacion);
        $reservacion->delete();

        return redirect("reservaciones");
    }
}
