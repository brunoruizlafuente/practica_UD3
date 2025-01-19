<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Inventario;

class InventarioSeeder extends Seeder
{
    public function run()
    {
        Inventario::create([
            'producto_id' => 1, // Portátil Dell
            'cantidad_stock' => 10,
            'ubicacion_almacen' => 'Sección A1',
        ]);

        Inventario::create([
            'producto_id' => 2, // HP Pavilion
            'cantidad_stock' => 5,
            'ubicacion_almacen' => 'Sección B2',
        ]);

        Inventario::create([
            'producto_id' => 3, // Monitor LG
            'cantidad_stock' => 20,
            'ubicacion_almacen' => 'Sección C3',
        ]);

        Inventario::create([
            'producto_id' => 4, // Teclado Logitech
            'cantidad_stock' => 15,
            'ubicacion_almacen' => 'Sección A2',
        ]);

        Inventario::create([
            'producto_id' => 5, // Disco Duro Externo Seagate
            'cantidad_stock' => 30,
            'ubicacion_almacen' => 'Sección D1',
        ]);
    }
}
