<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.show')->with(['clientes' => $clientes]);
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'nombre' => 'required|string',
            'correo' => 'required|string|unique:clientes',
            'telefono' => 'required|string',
            'fecha_registro' => 'required|date',
        ]);

        Cliente::create($data);
        return redirect('/clientes/show');
    }

    public function show(Cliente $cliente)
    {
        return view('clientes.show_single')->with(['cliente' => $cliente]);
    }

    public function edit(Cliente $cliente)
    {
        return view('clientes.edit')->with(['cliente' => $cliente]);
    }

    public function update(Request $request, Cliente $cliente)
    {
        $data = request()->validate([
            'nombre' => 'required|string',
            'correo' => 'required|string|unique:clientes,correo,' . $cliente->id_cliente,
            'telefono' => 'required|string',
            'fecha_registro' => 'required|date',
        ]);

        $cliente->update($data);
        return redirect('/clientes/show');
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return response()->json(['res' => true]);
    }
}
