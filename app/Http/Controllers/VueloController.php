<?php

namespace App\Http\Controllers;

use App\Models\Vuelo;
use Illuminate\Http\Request;

class VueloController extends Controller
{
    public function index()
    {
        $vuelos = Vuelo::all();
        return view('vuelos.show')->with(['vuelos' => $vuelos]);
    }

    public function create()
    {
        return view('vuelos.create');
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'origen' => 'required|string',
            'destino' => 'required|string',
            'fecha_salida' => 'required|date',
            'hora_salida' => 'required|time',
            'hora_llegada' => 'required|time',
            'precio' => 'required|decimal',
            'estado_vuelo' => 'required|string',
            'clase_de_vuelo' => 'required|string',
        ]);

        Vuelo::create($data);
        return redirect('/vuelos/show');
    }

    public function show(Vuelo $vuelo)
    {
        return view('vuelos.show_single')->with(['vuelo' => $vuelo]);
    }

    public function edit(Vuelo $vuelo)
    {
        return view('vuelos.edit')->with(['vuelo' => $vuelo]);
    }

    public function update(Request $request, Vuelo $vuelo)
    {
        $data = request()->validate([
            'origen' => 'required|string',
            'destino' => 'required|string',
            'fecha_salida' => 'required|date',
            'hora_salida' => 'required|time',
            'hora_llegada' => 'required|time',
            'precio' => 'required|decimal',
            'estado_vuelo' => 'required|string',
            'clase_de_vuelo' => 'required|string',
        ]);

        $vuelo->update($data);
        return redirect('/vuelos/show');
    }

    public function destroy(Vuelo $vuelo)
    {
        $vuelo->delete();
        return response()->json(['res' => true]);
    }
}
