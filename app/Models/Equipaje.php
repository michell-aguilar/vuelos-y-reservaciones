<?php

namespace App\Http\Controllers;

use App\Models\Equipaje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EquipajeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $equipajes = DB::table('equipaje')->get();
        return view('equipaje.show', ['equipajes' => $equipajes]);
    }

    public function create()
    {
        return view('equipaje.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required|string|max:255',
            'peso' => 'required|numeric|min:0',
            'dimensiones' => 'required|string|max:255',
            'id_reservacion' => 'required|exists:reservaciones,id_reservacion',
        ]);

        Equipaje::create($request->all());
        return redirect()->route('equipaje.index')->with('success', 'Equipaje creado con éxito.');
    }

    public function show(Equipaje $equipaje)
    {
        return view('equipaje.show', compact('equipaje'));
    }

    public function edit($id)
    {
        $equipaje = Equipaje::find($id);
        return view('equipaje.update', ['equipaje' => $equipaje]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tipo' => 'required|string|max:255',
            'peso' => 'required|numeric|min:0',
            'dimensiones' => 'required|string|max:255',
            'id_reservacion' => 'required|exists:reservaciones,id_reservacion',
        ]);

        $equipaje = Equipaje::find($id);
        $equipaje->update($request->all());
        return redirect()->route('equipaje.index')->with('success', 'Equipaje actualizado con éxito.');
    }

    public function destroy($id)
    {
        $equipaje = Equipaje::find($id);
        $equipaje->delete();
        return redirect()->route('equipaje.index')->with('success', 'Equipaje eliminado con éxito.');
    }
}
