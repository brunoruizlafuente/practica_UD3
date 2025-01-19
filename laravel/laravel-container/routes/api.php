<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\DetallePedidoController;
use App\Http\Controllers\InventarioController;


Route::get('categorias', [CategoriaController::class, 'index']);    
Route::get('categorias/{id}', [CategoriaController::class, 'show']); 
Route::post('categorias', [CategoriaController::class, 'store']);   
Route::put('categorias/{id}', [CategoriaController::class, 'update']);   
Route::delete('categorias/{id}', [CategoriaController::class, 'destroy']); 


Route::get('productos', [ProductoController::class, 'index']);
Route::get('productos/{id}', [ProductoController::class, 'show']);
Route::post('productos', [ProductoController::class, 'store']);
Route::put('productos/{id}', [ProductoController::class, 'update']);
Route::delete('productos/{id}', [ProductoController::class, 'destroy']);


Route::get('clientes', [ClienteController::class, 'index']);
Route::get('clientes/{id}', [ClienteController::class, 'show']);
Route::post('clientes', [ClienteController::class, 'store']);
Route::put('clientes/{id}', [ClienteController::class, 'update']);
Route::delete('clientes/{id}', [ClienteController::class, 'destroy']);


Route::get('pedidos', [PedidoController::class, 'index']);
Route::get('pedidos/{id}', [PedidoController::class, 'show']);
Route::post('pedidos', [PedidoController::class, 'store']);
Route::put('pedidos/{id}', [PedidoController::class, 'update']);
Route::delete('pedidos/{id}', [PedidoController::class, 'destroy']);


Route::get('detalles-pedidos', [DetallePedidoController::class, 'index']);
Route::get('detalles-pedidos/{id}', [DetallePedidoController::class, 'show']);
Route::post('detalles-pedidos', [DetallePedidoController::class, 'store']);
Route::put('detalles-pedidos/{id}', [DetallePedidoController::class, 'update']);
Route::delete('detalles-pedidos/{id}', [DetallePedidoController::class, 'destroy']);


Route::get('inventarios', [InventarioController::class, 'index']);
Route::get('inventarios/{id}', [InventarioController::class, 'show']);
Route::post('inventarios', [InventarioController::class, 'store']);
Route::put('inventarios/{id}', [InventarioController::class, 'update']);
Route::delete('inventarios/{id}', [InventarioController::class, 'destroy']);
