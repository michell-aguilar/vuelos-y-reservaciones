<?php

namespace App\Http\Controllers;

use App\Models\Vuelo;
use Illuminate\Http\Request;

class VueloController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $vuelos = Vuelo::all();
        return view('vuelos.show', ['vuelos' => $vuelos]);
    }

    public function create()
    {
        return view('vuelos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'origen' => 'required',
            'destino' => 'required',
            'fecha_salida' => 'required|date',
            'hora_salida' => 'required',
            'fecha_llegada' => 'required|date',
            'hora_llegada' => 'required',
            'precio' => 'required|numeric',
            // otros campos de validación
        ]);

        Vuelo::create($request->all());
        return redirect('vuelos');
    }

    public function show(Vuelo $vuelo)
    {
        return view('vuelos.show_single', ['vuelo' => $vuelo]);
    }

    public function edit($id)
    {
        $vuelo = Vuelo::find($id);
        return view('vuelos.edit', ['vuelo' => $vuelo]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'origen' => 'required',
            'destino' => 'required',
            'fecha_salida' => 'required|date',
            'hora_salida' => 'required',
            'fecha_llegada' => 'required|date',
            'hora_llegada' => 'required',
            'precio' => 'required|numeric',
            // otros campos de validación
        ]);

        $vuelo = Vuelo::find($id);
        $vuelo->update($request->all());
        return redirect('vuelos');
    }

    public function destroy($id)
    {
        $vuelo = Vuelo::find($id);
        $vuelo->delete();
        return redirect('vuelos');
    }
}
