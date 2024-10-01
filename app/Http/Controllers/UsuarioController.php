<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = DB::table('usuarios')
        ->select('id_usuario', 'nombre', 'correo', 'telefono', 'fecha_registro')
            ->orderBy('id_usuario', 'desc')
            ->get();

        return view('usuarios.show', ['usuarios' => $usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'correo' => 'required|email',
            'teléfono' => 'required',
        ]);

        $usuario = new Usuario();

        $usuario->nombre = $request->input('nombre');
        $usuario->correo = $request->input('correo');
        $usuario->teléfono = $request->input('teléfono');
        $usuario->fecha_registro = now();

        $usuario->save();

        return redirect("usuarios");
    }

    /**
     * Display the specified resource.
     */
    public function show($id_usuario)
    {
        $usuario = Usuario::find($id_usuario);
        return view('usuarios.show', ['usuario' => $usuario]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_usuario)
    {
        $usuario = Usuario::find($id_usuario);
        return view('usuarios.edit', ['usuario' => $usuario]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_usuario)
    {
        $request->validate([
            'nombre' => 'required',
            'correo' => 'required|email',
            'teléfono' => 'required',
        ]);

        $usuario = Usuario::find($id_usuario);

        $usuario->nombre = $request->input('nombre');
        $usuario->correo = $request->input('correo');
        $usuario->teléfono = $request->input('teléfono');

        $usuario->save();

        return redirect("usuarios");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_usuario)
    {
        $usuario = Usuario::find($id_usuario);
        $usuario->delete();

        return redirect("usuarios");
    }
}
