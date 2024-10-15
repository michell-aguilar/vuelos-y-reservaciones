<?php

namespace App\Http\Controllers;

use App\Models\Aerolinea;
use Illuminate\Http\Request;

class AerolineaController extends Controller
{
    public function index()
    {
        $aerolineas = Aerolinea::all();
        return view('aerolineas.show')->with(['aerolineas' => $aerolineas]);
    }

    public function create()
    {
        return view('aerolineas.create');
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'nombre' => 'required|string',
            'pais' => 'required|string',
            'direccion_ubicacion' => 'required|string',
        ]);

        Aerolinea::create($data);
        return redirect('/aerolineas/show');
    }

    public function show(Aerolinea $aerolinea)
    {
        return view('aerolineas.show_single')->with(['aerolinea' => $aerolinea]);
    }

    public function edit(Aerolinea $aerolinea)
    {
        return view('aerolineas.edit')->with(['aerolinea' => $aerolinea]);
    }

    public function update(Request $request, Aerolinea $aerolinea)
    {
        $data = request()->validate([
            'nombre' => 'required|string',
            'pais' => 'required|string',
            'direccion_ubicacion' => 'required|string',
        ]);

        $aerolinea->update($data);
        return redirect('/aerolineas/show');
    }

    public function destroy(Aerolinea $aerolinea)
    {
        $aerolinea->delete();
        return response()->json(['res' => true]);
    }
}
