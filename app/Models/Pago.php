<?php

namespace App\Http\Controllers;

use App\Models\Pagos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pagos = Pagos::all();
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

        $pago = new Pagos();
        $pago->id_reservacion = $request->input('id_reservacion');
        $pago->monto = $request->input('monto');
        $pago->fecha_pago = $request->input('fecha_pago');
        $pago->metodo_pago = $request->input('metodo_pago');
        $pago->save();

        return redirect()->route('pagos.index');
    }

    public function show(Pagos $pagos)
    {
        return view('pagos.show_single', ['pago' => $pagos]);
    }

    public function edit($id)
    {
        $pago = Pagos::find($id);
        return view('pagos.edit', ['pago' => $pago]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'monto' => 'required|numeric',
            'fecha_pago' => 'required|date',
            'metodo_pago' => 'required|string',
        ]);

        $pago = Pagos::find($id);
        $pago->monto = $request->input('monto');
        $pago->fecha_pago = $request->input('fecha_pago');
        $pago->metodo_pago = $request->input('metodo_pago');
        $pago->save();

        return redirect()->route('pagos.index');
    }

    public function destroy($id)
    {
        $pago = Pagos::find($id);
        $pago->delete();

        return redirect()->route('pagos.index');
    }
}
