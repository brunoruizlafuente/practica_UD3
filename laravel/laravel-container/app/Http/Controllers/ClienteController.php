<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    // GET /api/clientes
    public function index()
    {
        $clientes = Cliente::all();
        return response()->json($clientes, 200);
    }

    // GET /api/clientes/{id}
    public function show($id)
    {
        $cliente = Cliente::find($id);
        if (!$cliente) {
            return response()->json(['error' => 'Cliente no encontrado'], 404);
        }
        return response()->json($cliente, 200);
    }

    // POST /api/clientes
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'email' => 'required|email|unique:clientes,email',
            'direccion_envio' => 'nullable|string',
            'direccion_facturacion' => 'nullable|string',
            'telefono' => 'nullable|string|max:20',
        ]);

        $cliente = Cliente::create($validatedData);
        return response()->json($cliente, 201);
    }

    // PUT /api/clientes/{id}
    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);
        if (!$cliente) {
            return response()->json(['error' => 'Cliente no encontrado'], 404);
        }

        $validatedData = $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'email' => 'required|email|unique:clientes,email,'.$cliente->id,
            'direccion_envio' => 'nullable|string',
            'direccion_facturacion' => 'nullable|string',
            'telefono' => 'nullable|string|max:20',
        ]);

        $cliente->update($validatedData);
        return response()->json($cliente, 200);
    }

    // DELETE /api/clientes/{id}
    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        if (!$cliente) {
            return response()->json(['error' => 'Cliente no encontrado'], 404);
        }

        $cliente->delete();
        return response()->json(null, 204);
    }
}
