<?php

namespace App\Http\Controllers;

use App\Models\Aerolineas;
use Illuminate\Http\Request;

class AerolineasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $aerolineas = Aerolineas::all();
        return view('aerolineas.show', ['aerolineas' => $aerolineas]);
    }

    public function create()
    {
        return view('aerolineas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            // otros campos de validación
        ]);

        Aerolineas::create($request->all());
        return redirect('aerolineas');
    }

    public function show(Aerolineas $aerolineas)
    {
        return view('aerolineas.show_single', ['aerolineas' => $aerolineas]);
    }

    public function edit($id)
    {
        $aerolineas = Aerolineas::find($id);
        return view('aerolineas.edit', ['aerolineas' => $aerolineas]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            // otros campos de validación
        ]);

        $aerolineas = Aerolineas::find($id);
        $aerolineas->update($request->all());
        return redirect('aerolineas');
    }

    public function destroy($id)
    {
        $aerolineas = Aerolineas::find($id);
        $aerolineas->delete();
        return redirect('aerolineas');
    }
}
