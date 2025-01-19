<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DetallePedido;
use App\Models\Pedido;
use App\Models\Producto;

class DetallePedidoSeeder extends Seeder
{
    public function run()
    {
        // Pedido 1 (cliente 1: Carlos)
        DetallePedido::create([
            'pedido_id' => 1,
            'producto_id' => 1,  // "Portátil Dell Inspiron 15"
            'cantidad' => 1,
            'precio_unitario' => 699.99,
        ]);
        DetallePedido::create([
            'pedido_id' => 1,
            'producto_id' => 5,  // "Disco Duro Externo Seagate 2TB"
            'cantidad' => 2,
            'precio_unitario' => 69.90,
        ]);

        // Pedido 2 (cliente 2: María)
        DetallePedido::create([
            'pedido_id' => 2,
            'producto_id' => 2,  // "HP Pavilion Gaming Desktop"
            'cantidad' => 1,
            'precio_unitario' => 1099.50,
        ]);

        // Pedido 3 (cliente 3: Pedro)
        DetallePedido::create([
            'pedido_id' => 3,
            'producto_id' => 4,  // "Teclado Mecánico Logitech G513"
            'cantidad' => 1,
            'precio_unitario' => 129.99,
        ]);
        DetallePedido::create([
            'pedido_id' => 3,
            'producto_id' => 3,  // "Monitor LG UltraWide 29"
            'cantidad' => 1,
            'precio_unitario' => 249.90,
        ]);
    }
}