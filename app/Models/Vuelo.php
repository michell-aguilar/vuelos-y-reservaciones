<?php

namespace App\Http\Controllers;

use App\Models\Vuelos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VuelosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $vuelos = DB::table('vuelos')->get();
        return view('vuelos.show', ['vuelos' => $vuelos]);
    }

    public function create()
    {
        return view('vuelos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'origen' => 'required|string|max:255',
            'destino' => 'required|string|max:255',
            'fecha_salida' => 'required|date',
            'hora_salida' => 'required',
            'fecha_llegada' => 'required|date',
            'hora_llegada' => 'required',
            'precio' => 'required|numeric',
            'estado_vuelo' => 'required|string|max:50',
        ]);

        Vuelos::create($request->all());
        return redirect()->route('vuelos.index')->with('success', 'Vuelo creado con éxito.');
    }

    public function show(Vuelos $vuelo)
    {
        return view('vuelos.show', compact('vuelo'));
    }

    public function edit($id)
    {
        $vuelo = Vuelos::find($id);
        return view('vuelos.update', ['vuelo' => $vuelo]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'origen' => 'required|string|max:255',
            'destino' => 'required|string|max:255',
            'fecha_salida' => 'required|date',
            'hora_salida' => 'required',
            'fecha_llegada' => 'required|date',
            'hora_llegada' => 'required',
            'precio' => 'required|numeric',
            'estado_vuelo' => 'required|string|max:50',
        ]);

        $vuelo = Vuelos::find($id);
        $vuelo->update($request->all());
        return redirect()->route('vuelos.index')->with('success', 'Vuelo actualizado con éxito.');
    }

    public function destroy($id)
    {
        $vuelo = Vuelos::find($id);
        $vuelo->delete();
        return redirect()->route('vuelos.index')->with('success', 'Vuelo eliminado con éxito.');
    }
}
