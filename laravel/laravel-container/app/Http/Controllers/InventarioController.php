<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    // GET /api/inventarios
    public function index()
    {
        // Podemos querer ver datos del producto también
        $inventarios = Inventario::with('producto')->get();
        return response()->json($inventarios, 200);
    }

    // GET /api/inventarios/{id}
    public function show($id)
    {
        $inventario = Inventario::with('producto')->find($id);
        if (!$inventario) {
            return response()->json(['error' => 'Registro de inventario no encontrado'], 404);
        }
        return response()->json($inventario, 200);
    }

    // POST /api/inventarios
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cantidad_stock' => 'required|integer|min:0',
            'ubicacion_almacen' => 'nullable|string',
        ]);

        $inventario = Inventario::create($validatedData);
        return response()->json($inventario, 201);
    }

    // PUT /api/inventarios/{id}
    public function update(Request $request, $id)
    {
        $inventario = Inventario::find($id);
        if (!$inventario) {
            return response()->json(['error' => 'Registro de inventario no encontrado'], 404);
        }

        $validatedData = $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cantidad_stock' => 'required|integer|min:0',
            'ubicacion_almacen' => 'nullable|string',
        ]);

        $inventario->update($validatedData);
        return response()->json($inventario, 200);
    }

    // DELETE /api/inventarios/{id}
    public function destroy($id)
    {
        $inventario = Inventario::find($id);
        if (!$inventario) {
            return response()->json(['error' => 'Registro de inventario no encontrado'], 404);
        }

        $inventario->delete();
        return response()->json(null, 204);
    }
}
