<?php

namespace App\Http\Controllers;

use App\Models\Avion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AvionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $aviones = DB::table('aviones')->get();
        return view('avion.show', ['aviones' => $aviones]);
    }

    public function create()
    {
        return view('avion.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'modelo' => 'required|string|max:255',
            'capacidad' => 'required|integer',
            'aerolinea_id' => 'required|exists:aerolineas,id',
        ]);

        Avion::create($request->all());
        return redirect()->route('avion.index')->with('success', 'Avión creado con éxito.');
    }

    public function show(Avion $avion)
    {
        return view('avion.show', compact('avion'));
    }

    public function edit($id)
    {
        $avion = Avion::find($id);
        return view('avion.update', ['avion' => $avion]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'modelo' => 'required|string|max:255',
            'capacidad' => 'required|integer',
            'aerolinea_id' => 'required|exists:aerolineas,id',
        ]);

        $avion = Avion::find($id);
        $avion->update($request->all());
        return redirect()->route('avion.index')->with('success', 'Avión actualizado con éxito.');
    }

    public function destroy($id)
    {
        $avion = Avion::find($id);
        $avion->delete();
        return redirect()->route('avion.index')->with('success', 'Avión eliminado con éxito.');
    }
}
