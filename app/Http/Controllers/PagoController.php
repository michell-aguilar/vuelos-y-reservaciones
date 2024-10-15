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

    public function index()
    {
        $pagos = Pago::all();
        return view('pagos.show', ['pagos' => $pagos]);
    }

    public function create()
    {
        return view('pagos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'monto' => 'required',
            // otros campos de validación
        ]);

        Pago::create($request->all());
        return redirect('pagos');
    }

    public function show(Pago $pago)
    {
        return view('pagos.show_single', ['pago' => $pago]);
    }

    public function edit($id)
    {
        $pago = Pago::find($id);
        return view('pagos.edit', ['pago' => $pago]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'monto' => 'required',
            // otros campos de validación
        ]);

        $pago = Pago::find($id);
        $pago->update($request->all());
        return redirect('pagos');
    }

    public function destroy($id)
    {
        $pago = Pago::find($id);
        $pago->delete();
        return redirect('pagos');
    }
}
