<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    // GET /api/pedidos
    public function index()
    {
        // Podrías querer cargar también los detalles o cliente, pero como ejemplo:
        $pedidos = Pedido::with(['cliente'])->get();
        return response()->json($pedidos, 200);
    }

    // GET /api/pedidos/{id}
    public function show($id)
    {
        // Podrías querer incluir 'detalles' o 'productos' en la respuesta
        $pedido = Pedido::with(['cliente', 'productos'])->find($id);
        if (!$pedido) {
            return response()->json(['error' => 'Pedido no encontrado'], 404);
        }
        return response()->json($pedido, 200);
    }

    // POST /api/pedidos
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'fecha_pedido' => 'required|date',
            'estado' => 'required|string',
        ]);

        $pedido = Pedido::create($validatedData);
        return response()->json($pedido, 201);
    }

    // PUT /api/pedidos/{id}
    public function update(Request $request, $id)
    {
        $pedido = Pedido::find($id);
        if (!$pedido) {
            return response()->json(['error' => 'Pedido no encontrado'], 404);
        }

        $validatedData = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'fecha_pedido' => 'required|date',
            'estado' => 'required|string',
        ]);

        $pedido->update($validatedData);
        return response()->json($pedido, 200);
    }

    // DELETE /api/pedidos/{id}
    public function destroy($id)
    {
        $pedido = Pedido::find($id);
        if (!$pedido) {
            return response()->json(['error' => 'Pedido no encontrado'], 404);
        }

        $pedido->delete();
        return response()->json(null, 204);
    }
}
