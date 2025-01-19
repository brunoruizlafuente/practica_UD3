<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // GET /api/productos
    public function index()
    {
        $productos = Producto::all();
        return response()->json($productos, 200);
    }

    // GET /api/productos/{id}
    public function show($id)
    {
        $producto = Producto::find($id);
        if (!$producto) {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }
        return response()->json($producto, 200);
    }

    // POST /api/productos
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:150',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'imagen_url' => 'nullable|string',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $producto = Producto::create($validatedData);
        return response()->json($producto, 201);
    }

    // PUT /api/productos/{id}
    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);
        if (!$producto) {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }

        $validatedData = $request->validate([
            'nombre' => 'required|string|max:150',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'imagen_url' => 'nullable|string',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $producto->update($validatedData);
        return response()->json($producto, 200);
    }

    // DELETE /api/productos/{id}
    public function destroy($id)
    {
        $producto = Producto::find($id);
        if (!$producto) {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }

        $producto->delete();
        return response()->json(null, 204);
    }
}
