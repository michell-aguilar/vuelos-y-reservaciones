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

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $equipajes = Equipaje::orderBy('id_equipaje', 'desc')->get();
        return view('equipajes.show', ['equipajes' => $equipajes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('equipajes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_cliente' => 'required',
            'peso' => 'required|numeric',
            'descripcion' => 'nullable|string',
        ]);

        $equipaje = new Equipaje();
        $equipaje->id_cliente = $request->input('id_cliente');
        $equipaje->peso = $request->input('peso');
        $equipaje->descripcion = $request->input('descripcion');

        $equipaje->save();
        return redirect("equipajes");
    }

    /**
     * Display the specified resource.
     */
    public function show($id_equipaje)
    {
        $equipaje = Equipaje::find($id_equipaje);
        return view('equipajes.show', ['equipaje' => $equipaje]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_equipaje)
    {
        $equipaje = Equipaje::find($id_equipaje);
        return view('equipajes.edit', ['equipaje' => $equipaje]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_equipaje)
    {
        $request->validate([
            'id_cliente' => 'required',
            'peso' => 'required|numeric',
            'descripcion' => 'nullable|string',
        ]);

        $equipaje = Equipaje::find($id_equipaje);
        $equipaje->id_cliente = $request->input('id_cliente');
        $equipaje->peso = $request->input('peso');
        $equipaje->descripcion = $request->input('descripcion');

        $equipaje->save();
        return redirect("equipajes");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_equipaje)
    {
        $equipaje = Equipaje::find($id_equipaje);
        $equipaje->delete();

        return redirect("equipajes");
    }
}
