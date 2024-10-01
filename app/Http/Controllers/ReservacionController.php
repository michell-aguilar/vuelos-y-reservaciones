<?php

namespace App\Http\Controllers;

use App\Models\Reservaciones;
use Illuminate\Http\Request;

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
            'fecha' => 'required',
            // otros campos de validación
        ]);

        Reservaciones::create($request->all());
        return redirect('reservaciones');
    }

    public function show(Reservaciones $reservacion)
    {
        return view('reservaciones.show_single', ['reservacion' => $reservacion]);
    }

    public function edit($id)
    {
        $reservacion = Reservaciones::find($id);
        return view('reservaciones.edit', ['reservacion' => $reservacion]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'fecha' => 'required',
            // otros campos de validación
        ]);

        $reservacion = Reservaciones::find($id);
        $reservacion->update($request->all());
        return redirect('reservaciones');
    }

    public function destroy($id)
    {
        $reservacion = Reservaciones::find($id);
        $reservacion->delete();
        return redirect('reservaciones');
    }
}
