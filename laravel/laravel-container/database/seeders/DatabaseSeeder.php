<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(CategoriaSeeder::class);

        $this->call(ProductoSeeder::class);

        $this->call(ClienteSeeder::class);

        $this->call(PedidoSeeder::class);

        $this->call(DetallePedidoSeeder::class);

        $this->call(InventarioSeeder::class);
    }
}
