<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    // GET /api/categorias
    public function index()
    {
        $categorias = Categoria::all();
        return response()->json($categorias, 200);
    }

    // GET /api/categorias/{id}
    public function show($id)
    {
        $categoria = Categoria::find($id);
        if (!$categoria) {
            return response()->json(['error' => 'Categoría no encontrada'], 404);
        }
        return response()->json($categoria, 200);
    }

    // POST /api/categorias
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
        ]);

        $categoria = Categoria::create($validatedData);
        return response()->json($categoria, 201);
    }

    // PUT /api/categorias/{id}
    public function update(Request $request, $id)
    {
        $categoria = Categoria::find($id);
        if (!$categoria) {
            return response()->json(['error' => 'Categoría no encontrada'], 404);
        }

        $validatedData = $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
        ]);

        $categoria->update($validatedData);
        return response()->json($categoria, 200);
    }

    // DELETE /api/categorias/{id}
    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        if (!$categoria) {
            return response()->json(['error' => 'Categoría no encontrada'], 404);
        }

        $categoria->delete();
        return response()->json(null, 204);
    }
}
