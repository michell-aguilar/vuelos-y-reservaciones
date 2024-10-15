<?php

namespace App\Http\Controllers;

use App\Models\Avion;
use Illuminate\Http\Request;

class AvionController extends Controller
{
    public function index()
    {
        $aviones = Avion::with('aerolinea')->get();
        return view('aviones.show')->with(['aviones' => $aviones]);
    }

    public function create()
    {
        return view('aviones.create');
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'modelo' => 'required|string',
            'capacidad' => 'required|integer',
            'id_aerolinea' => 'required|exists:aerolineas,id_aerolinea',
        ]);

        Avion::create($data);
        return redirect('/aviones/show');
    }

    public function show(Avion $avion)
    {
        return view('aviones.show_single')->with(['avion' => $avion]);
    }

    public function edit(Avion $avion)
    {
        return view('aviones.edit')->with(['avion' => $avion]);
    }

    public function update(Request $request, Avion $avion)
    {
        $data = request()->validate([
            'modelo' => 'required|string',
            'capacidad' => 'required|integer',
            'id_aerolinea' => 'required|exists:aerolineas,id_aerolinea',
        ]);

        $avion->update($data);
        return redirect('/aviones/show');
    }

    public function destroy(Avion $avion)
    {
        $avion->delete();
        return response()->json(['res' => true]);
    }
}
