<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Compra;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Compra::with('proveedor', 'detalleCompras')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $compra = Compra::create($request->all());

        return response()->json($compra, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $compra = Compra::with('proveedor', 'detalleCompras')->find($id);

        if (!$compra) {
            return response()->json([
                'message' => 'Compra no encontrada'
            ], 404);
        }

        return response()->json($compra);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $compra = Compra::find($id);

        if (!$compra) {
            return response()->json([
                'message' => 'Compra no encontrada'
            ], 404);
        }

        $compra->update($request->all());

        return response()->json($compra);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $compra = Compra::find($id);

        if (!$compra) {
            return response()->json([
                'message' => 'Compra no encontrada'
            ], 404);
        }

        $compra->delete();

        return response()->json([
            'message' => 'Compra eliminada correctamente'
        ]);
    }
}