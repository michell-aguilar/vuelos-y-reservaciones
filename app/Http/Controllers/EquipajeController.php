<?php

namespace App\Http\Controllers;

use App\Models\Equipaje;
use Illuminate\Http\Request;

class EquipajeController extends Controller
{
    public function index()
    {
        $equipajes = Equipaje::with('cliente', 'vuelo')->get();
        return view('equipajes.show')->with(['equipajes' => $equipajes]);
    }

    public function create()
    {
        return view('equipajes.create');
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'id_cliente' => 'required|exists:clientes,id_cliente',
            'id_vuelo' => 'required|exists:vuelos,id_vuelo',
            'peso' => 'required|numeric',
            'dimensiones' => 'required|string',
            'cantidad' => 'required|integer',
            'tipo' => 'required|string',
        ]);

        Equipaje::create($data);
        return redirect('/equipajes/show');
    }

    public function show(Equipaje $equipaje)
    {
        return view('equipajes.show_single')->with(['equipaje' => $equipaje]);
    }

    public function edit(Equipaje $equipaje)
    {
        return view('equipajes.edit')->with(['equipaje' => $equipaje]);
    }

    public function update(Request $request, Equipaje $equipaje)
    {
        $data = request()->validate([
            'id_cliente' => 'required|exists:clientes,id_cliente',
            'id_vuelo' => 'required|exists:vuelos,id_vuelo',
            'peso' => 'required|numeric',
            'dimensiones' => 'required|string',
            'cantidad' => 'required|integer',
            'tipo' => 'required|string',
        ]);

        $equipaje->update($data);
        return redirect('/equipajes/show');
    }

    public function destroy(Equipaje $equipaje)
    {
        $equipaje->delete();
        return response()->json(['res' => true]);
    }
}
