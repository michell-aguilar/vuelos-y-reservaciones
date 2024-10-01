<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuariosController extends Controller
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
        $usuarios = DB::table('users')
        ->get();

        return view('usuarios.show', ['usuarios' => $usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuarios $usuarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $usuarios = Usuarios::find($id);
        return view('usuarios.update', ['usuarios'=> $usuarios]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request-> validate([
            'name' => 'required',
            'email'  => 'required',
            ]);

            $usuarios = Usuarios::find($id);

            $usuarios->name=$request->input('name'); 
            $usuarios->email=$request->input('email');       
            $usuarios->save();
            return redirect("usuarios");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $usuarios= Usuarios::find($id);
        $usuarios->delete();
        
        return redirect("usuarios");
    }
}