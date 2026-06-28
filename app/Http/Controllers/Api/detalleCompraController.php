<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\detalleCompra;

class detalleCompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return DetalleCompra::with('compra', 'producto')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $detalleCompra = DetalleCompra::create($request->all());

        return response()->json($detalleCompra, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $detalleCompra = DetalleCompra::with('compra', 'producto')->find($id);

        if (!$detalleCompra) {
            return response()->json([
                'message' => 'Detalle de compra no encontrado'
            ], 404);
        }

        return response()->json($detalleCompra);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $detalleCompra = DetalleCompra::find($id);

        if (!$detalleCompra) {
            return response()->json([
                'message' => 'Detalle de compra no encontrado'
            ], 404);
        }

        $detalleCompra->update($request->all());

        return response()->json($detalleCompra);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $detalleCompra = DetalleCompra::find($id);

        if (!$detalleCompra) {
            return response()->json([
                'message' => 'Detalle de compra no encontrado'
            ], 404);
        }

        $detalleCompra->delete();

        return response()->json([
            'message' => 'Detalle de compra eliminado correctamente'
        ]);
    }
}