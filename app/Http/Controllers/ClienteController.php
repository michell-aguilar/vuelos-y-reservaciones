<?php

namespace App\Http\Controllers;

use App\Models\Avion;
use App\Models\Aerolinea;
use Illuminate\Http\Request;

class ClienteController extends Controller
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
        $cliente=Cliente::with('Cliente')
            ->select('id_cliente','nombre','correo','telefono','fecha_registro')
            ->orderBy('id_avion','desc')
            ->get();
            
            return view('aviones.show',['avion' => $avion]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('aviones.create',['aerolineas' => Aerolinea::all()]);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate ([
            'id_aerolineas'=> 'required',
                'modelo'=> 'required',
                'capacidad'=> 'required',
             ]);
             
        $avion = new Avion();

        $avion->id_aerolineas=$request->input('id_aerolineas');$avion->modelo=$request->input('modelo');$avion->capacidad=$request->input('capacidad');


       $avion->save();
       return redirect("aviones");
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('aviones.show');
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_avion)
    {
        $avion = Avion::find($id_avion);
        return view('aviones.edit', ['avion'=>$avion,'aerolineas' => Aerolinea::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_avion)
    {
        $request->validate ([
            'id_aerolineas'=> 'required',
                'modelo'=> 'required',
                'capacidad'=> 'required',
             ]);
             
        $avion = Avion::find($id_avion);

        $avion->id_aerolineas=$request->input('id_aerolineas');$avion->modelo=$request->input('modelo');$avion->capacidad=$request->input('capacidad');


       $avion->save();
       return redirect("aviones");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_avion)
    {
        $avion= Avion::find($id_avion);
        $avion->delete();
        
        return redirect("aviones");
    }
}
