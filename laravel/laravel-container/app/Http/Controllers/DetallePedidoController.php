<?php

namespace App\Http\Controllers;

use App\Models\DetallePedido;
use Illuminate\Http\Request;

class DetallePedidoController extends Controller
{
    // GET /api/detalles-pedidos
    public function index()
    {
        // Para ver datos de pedido/producto, podríamos usar with(['pedido','producto'])
        $detalles = DetallePedido::with(['pedido', 'producto'])->get();
        return response()->json($detalles, 200);
    }

    // GET /api/detalles-pedidos/{id}
    public function show($id)
    {
        $detalle = DetallePedido::with(['pedido', 'producto'])->find($id);
        if (!$detalle) {
            return response()->json(['error' => 'Detalle no encontrado'], 404);
        }
        return response()->json($detalle, 200);
    }

    // POST /api/detalles-pedidos
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pedido_id' => 'required|exists:pedidos,id',
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric',
        ]);

        $detalle = DetallePedido::create($validatedData);
        return response()->json($detalle, 201);
    }

    // PUT /api/detalles-pedidos/{id}
    public function update(Request $request, $id)
    {
        $detalle = DetallePedido::find($id);
        if (!$detalle) {
            return response()->json(['error' => 'Detalle no encontrado'], 404);
        }

        $validatedData = $request->validate([
            'pedido_id' => 'required|exists:pedidos,id',
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric',
        ]);

        $detalle->update($validatedData);
        return response()->json($detalle, 200);
    }

    // DELETE /api/detalles-pedidos/{id}
    public function destroy($id)
    {
        $detalle = DetallePedido::find($id);
        if (!$detalle) {
            return response()->json(['error' => 'Detalle no encontrado'], 404);
        }

        $detalle->delete();
        return response()->json(null, 204);
    }
}
