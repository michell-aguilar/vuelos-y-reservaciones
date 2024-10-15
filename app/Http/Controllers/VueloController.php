<?php 

namespace App\Http\Controllers;

use App\Models\Vuelo;
use Illuminate\Http\Request;

class VueloController extends Controller
{
    public function index()
    {
        $vuelos = Vuelo::all();
        return response()->json($vuelos);
    }

    public function show($id)
    {
        $vuelo = Vuelo::find($id);
        return response()->json($vuelo);
    }

    public function store(Request $request)
    {
        $vuelo = Vuelo::create($request->all());
        return response()->json($vuelo, 201);
    }

    public function update(Request $request, $id)
    {
        $vuelo = Vuelo::find($id);
        $vuelo->update($request->all());
        return response()->json($vuelo);
    }

    public function destroy($id)
    {
        Vuelo::destroy($id);
        return response()->json(null, 204);
    }
}