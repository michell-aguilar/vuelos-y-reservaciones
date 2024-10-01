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

    public function index(Request $request)
    {
        $clientes = Cliente::orderBy('id_cliente', 'desc')->get();
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
            'correo' => 'required|email',
            'telefono' => 'required',
            'fecha_registro' => 'required|date',
        ]);

        $cliente = new Cliente();
        $cliente->nombre = $request->input('nombre');
        $cliente->correo = $request->input('correo');
        $cliente->telefono = $request->input('telefono');
        $cliente->fecha_registro = $request->input('fecha_registro');
        
        $cliente->save();
        return redirect("clientes");
    }

    public function show($id_cliente)
    {
        $cliente = Cliente::find($id_cliente);
        return view('clientes.show', ['cliente' => $cliente]);
    }

    public function edit($id_cliente)
    {
        $cliente = Cliente::find($id_cliente);
        return view('clientes.edit', ['cliente' => $cliente]);
    }

    public function update(Request $request, $id_cliente)
    {
        $request->validate([
            'nombre' => 'required',
            'correo' => 'required|email',
            'telefono' => 'required',
            'fecha_registro' => 'required|date',
        ]);

        $cliente = Cliente::find($id_cliente);
        $cliente->nombre = $request->input('nombre');
        $cliente->correo = $request->input('correo');
        $cliente->telefono = $request->input('telefono');
        $cliente->fecha_registro = $request->input('fecha_registro');
        
        $cliente->save();
        return redirect("clientes");
    }

    public function destroy($id_cliente)
    {
        $cliente = Cliente::find($id_cliente);
        $cliente->delete();
        
        return redirect("clientes");
    }
}
