<?php

namespace App\Http\Controllers;

use App\Models\Equipaje;
use Illuminate\Http\Request;

class EquipajeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $equipajes = Equipaje::all();
        return view('equipajes.show', ['equipajes' => $equipajes]);
    }

    public function create()
    {
        return view('equipajes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required',
            // otros campos de validación
        ]);

        Equipaje::create($request->all());
        return redirect('equipajes');
    }

    public function show(Equipaje $equipaje)
    {
        return view('equipajes.show_single', ['equipaje' => $equipaje]);
    }

    public function edit($id)
    {
        $equipaje = Equipaje::find($id);
        return view('equipajes.edit', ['equipaje' => $equipaje]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'descripcion' => 'required',
            // otros campos de validación
        ]);

        $equipaje = Equipaje::find($id);
        $equipaje->update($request->all());
        return redirect('equipajes');
    }

    public function destroy($id)
    {
        $equipaje = Equipaje::find($id);
        $equipaje->delete();
        return redirect('equipajes');
    }
}
