<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function index()
    {
        $pagos = Pago::with('reservacion')->get();
        return view('pagos.show')->with(['pagos' => $pagos]);
    }

    public function create()
    {
        return view('pagos.create');
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'id_reservacion' => 'required|exists:reservaciones,id_reservacion',
            'monto' => 'required|decimal',
            'fecha_pago' => 'required|date',
            'metodo_pago' => 'required|string',
        ]);

        Pago::create($data);
        return redirect('/pagos/show');
    }

    public function show(Pago $pago)
    {
        return view('pagos.show_single')->with(['pago' => $pago]);
    }

    public function edit(Pago $pago)
    {
        return view('pagos.edit')->with(['pago' => $pago]);
    }

    public function update(Request $request, Pago $pago)
    {
        $data = request()->validate([
            'id_reservacion' => 'required|exists:reservaciones,id_reservacion',
            'monto' => 'required|decimal',
            'fecha_pago' => 'required|date',
            'metodo_pago' => 'required|string',
        ]);

        $pago->update($data);
        return redirect('/pagos/show');
    }

    public function destroy(Pago $pago)
    {
        $pago->delete();
        return response()->json(['res' => true]);
    }
}
