<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.show')->with(['usuarios' => $usuarios]);
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'nombre' => 'required|string',
            'correo' => 'required|string|unique:usuarios',
            'telefono' => 'required|string',
            'fecha_registro' => 'required|date',
        ]);

        Usuario::create($data);
        return redirect('/usuarios/show');
    }

    public function show(Usuario $usuario)
    {
        return view('usuarios.show_single')->with(['usuario' => $usuario]);
    }

    public function edit(Usuario $usuario)
    {
        return view('usuarios.edit')->with(['usuario' => $usuario]);
    }

    public function update(Request $request, Usuario $usuario)
    {
        $data = request()->validate([
            'nombre' => 'required|string',
            'correo' => 'required|string|unique:usuarios,correo,' . $usuario->id_usuario,
            'telefono' => 'required|string',
            'fecha_registro' => 'required|date',
        ]);

        $usuario->update($data);
        return redirect('/usuarios/show');
    }

    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return response()->json(['res' => true]);
    }
}
