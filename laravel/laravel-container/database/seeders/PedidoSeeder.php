<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pedido;

class PedidoSeeder extends Seeder
{
    public function run()
    {
        Pedido::create([
            'cliente_id' => 1,        
            'fecha_pedido' => now(),
            'estado' => 'pendiente',         
        ]);

        Pedido::create([
            'cliente_id' => 2,        
            'fecha_pedido' => now(),
            'estado' => 'pendiente',
        ]);

        Pedido::create([
            'cliente_id' => 3,        
            'fecha_pedido' => now(),
            'estado' => 'completado',
        ]);
    }
}
