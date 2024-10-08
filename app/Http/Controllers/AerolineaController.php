<?php

namespace App\Http\Controllers;

use App\Models\Aerolinea;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AerolineaController extends Controller
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
        $aeroli = Aerolinea::orderBy('id_aerolinea', 'desc')->get();
        return view('aerolineas.show', ['aeroli' => $aeroli]);
        
        
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('aerolineas.create',['aerolineas' => Aerolinea::all()]);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate ([
            'nombre'=> 'required',
                'pais'=> 'required',
                'direccion_de_ubicacion'=> 'required',
             ]);
             
        $aeroli = new Aerolinea();

        $aeroli->nombre=$request->input('nombre');
        $aeroli->pais=$request->input('pais');
        $aeroli->direccion_de_ubicacion=$request->input('direccion_de_ubicacion');

       $aeroli->save();
       return redirect("aerolineas");
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('clientes.show');
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $aeroli = Aerolinea::find($id);
        return view('aerolineas.edit', ['aeroli'=>$aeroli,'aerolinea' => Aerolinea::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_aerolinea)
    {
        $request->validate ([
            'nombre'=> 'required',
                'pais'=> 'required',
                'direccion_de_ubicacion'=> 'required',
             ]);
             
        $aeroli = Aerolinea::find($id_aerolinea);

        $aeroli->nombre=$request->input('nombre');$aeroli->pais=$request->input('pais');$aeroli->direccion_de_ubicacion=$request->input('direccion_de_ubicacion');

       $aeroli->save();
       return redirect("aerolineas");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_aerolinea)
    {
        $aeroli= Aerolinea::find($id_aerolinea);
        $aeroli->delete();
        
        return redirect("aerolineas");
    }
}
