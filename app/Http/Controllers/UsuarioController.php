<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.show', ['usuarios' => $usuarios]);
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'correo' => 'required|email',
            // otros campos de validación
        ]);

        Usuario::create($request->all());
        return redirect('usuarios');
    }

    public function show(Usuario $usuario)
    {
        return view('usuarios.show_single', ['usuario' => $usuario]);
    }

    public function edit($id)
    {
        $usuario = Usuario::find($id);
        return view('usuarios.edit', ['usuario' => $usuario]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'correo' => 'required|email',
            // otros campos de validación
        ]);

        $usuario = Usuario::find($id);
        $usuario->update($request->all());
        return redirect('usuarios');
    }

    public function destroy($id)
    {
        $usuario = Usuario::find($id);
        $usuario->delete();
        return redirect('usuarios');
    }
}
