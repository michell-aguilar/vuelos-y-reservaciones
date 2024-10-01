<?php

namespace App\Http\Controllers;

use App\Models\Aerolíneas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AerolíneasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $aerolineas = DB::table('aerolineas')->get();
        return view('aerolineas.show', ['aerolineas' => $aerolineas]);
    }

    public function create()
    {
        return view('aerolineas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'codigo' => 'required|string|max:10|unique:aerolineas,codigo',
            'pais' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:15',
        ]);

        Aerolineas::create($request->all());
        return redirect()->route('aerolineas.index')->with('success', 'Aerolínea creada con éxito.');
    }

    public function show(Aerolineas $aerolinea)
    {
        return view('aerolineas.show', compact('aerolinea'));
    }

    public function edit($id)
    {
        $aerolinea = Aerolineas::find($id);
        return view('aerolineas.update', ['aerolinea' => $aerolinea]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'codigo' => 'required|string|max:10|unique:aerolineas,codigo,' . $id,
            'pais' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:15',
        ]);

        $aerolinea = Aerolineas::find($id);
        $aerolinea->update($request->all());
        return redirect()->route('aerolineas.index')->with('success', 'Aerolínea actualizada con éxito.');
    }

    public function destroy($id)
    {
        $aerolinea = Aerolineas::find($id);
        $aerolinea->delete();
        return redirect()->route('aerolineas.index')->with('success', 'Aerolínea eliminada con éxito.');
    }
}
