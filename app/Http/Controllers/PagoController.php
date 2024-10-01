<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $pagos = Pago::orderBy('id_pago', 'desc')->get();
        return view('pagos.show', ['pagos' => $pagos]);
    }

    public function create()
    {
        return view('pagos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_reservacion' => 'required',
            'monto' => 'required|numeric',
            'fecha_pago' => 'required|date',
            'metodo_pago' => 'required|string',
        ]);

        $pago = new Pago();
        $pago->id_reservacion = $request->input('id_reservacion');
        $pago->monto = $request->input('monto');
        $pago->fecha_pago = $request->input('fecha_pago');
        $pago->metodo_pago = $request->input('metodo_pago');

        $pago->save();
        return redirect("pagos");
    }

    public function show($id_pago)
    {
        $pago = Pago::find($id_pago);
        return view('pagos.show', ['pago' => $pago]);
    }

    public function edit($id_pago)
    {
        $pago = Pago::find($id_pago);
        return view('pagos.edit', ['pago' => $pago]);
    }

    
    public function update(Request $request, $id_pago)
    {
        $request->validate([
            'id_reservacion' => 'required',
            'monto' => 'required|numeric',
            'fecha_pago' => 'required|date',
            'metodo_pago' => 'required|string',
        ]);

        $pago = Pago::find($id_pago);
        $pago->id_reservacion = $request->input('id_reservacion');
        $pago->monto = $request->input('monto');
        $pago->fecha_pago = $request->input('fecha_pago');
        $pago->metodo_pago = $request->input('metodo_pago');

        $pago->save();
        return redirect("pagos");
    }

    public function destroy($id_pago)
    {
        $pago = Pago::find($id_pago);
        $pago->delete();

        return redirect("pagos");
    }
}
