<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.show', ['clientes' => $clientes]);
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            // otros campos de validación
        ]);

        Cliente::create($request->all());
        return redirect('clientes');
    }

    public function show(Cliente $cliente)
    {
        return view('clientes.show_single', ['cliente' => $cliente]);
    }

    public function edit($id)
    {
        $cliente = Cliente::find($id);
        return view('clientes.edit', ['cliente' => $cliente]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            // otros campos de validación
        ]);

        $cliente = Cliente::find($id);
        $cliente->update($request->all());
        return redirect('clientes');
    }

    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();
        return redirect('clientes');
    }
}
