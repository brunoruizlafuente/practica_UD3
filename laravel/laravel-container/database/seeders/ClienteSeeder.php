<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    public function run()
    {       
        Cliente::create([
            'nombre' => 'Carlos',
            'apellido' => 'García',
            'email' => 'carlos@example.com',
            'direccion_envio' => 'Calle Falsa 123, Madrid',
            'direccion_facturacion' => 'Calle Falsa 123, Madrid',
            'telefono' => '600111222',
        ]);

        Cliente::create([
            'nombre' => 'María',
            'apellido' => 'López',
            'email' => 'maria@example.com',
            'direccion_envio' => 'Av. Reina 45, Barcelona',
            'direccion_facturacion' => 'Av. Reina 45, Barcelona',
            'telefono' => '610999888',
        ]);

        Cliente::create([
            'nombre' => 'Pedro',
            'apellido' => 'Martínez',
            'email' => 'pedro@example.com',
            'direccion_envio' => 'Paseo Marítimo 12, Valencia',
            'direccion_facturacion' => 'Paseo Marítimo 12, Valencia',
            'telefono' => '620555777',
        ]);
    }
}
