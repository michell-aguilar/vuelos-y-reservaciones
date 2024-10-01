<?php

namespace App\Http\Controllers;

use App\Models\Avion;
use Illuminate\Http\Request;

class AvionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $aviones = Avion::all();
        return view('aviones.show', ['aviones' => $aviones]);
    }

    public function create()
    {
        return view('aviones.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'modelo' => 'required',
            // otros campos de validación
        ]);

        Avion::create($request->all());
        return redirect('aviones');
    }

    public function show(Avion $avion)
    {
        return view('aviones.show_single', ['avion' => $avion]);
    }

    public function edit($id)
    {
        $avion = Avion::find($id);
        return view('aviones.edit', ['avion' => $avion]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'modelo' => 'required',
            // otros campos de validación
        ]);

        $avion = Avion::find($id);
        $avion->update($request->all());
        return redirect('aviones');
    }

    public function destroy($id)
    {
        $avion = Avion::find($id);
        $avion->delete();
        return redirect('aviones');
    }
}
