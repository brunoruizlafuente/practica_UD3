<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    public function run()
    {
        Producto::create([
            'nombre' => 'Portátil Dell Inspiron 15',
            'descripcion' => 'Portátil de 15 pulgadas con Intel Core i5, 8GB RAM, 256GB SSD',
            'precio' => 699.99,
            'imagen_url' => 'https://example.com/images/dell_inspiron.jpg',
            'categoria_id' => 1, 
        ]);

        Producto::create([
            'nombre' => 'HP Pavilion Gaming Desktop',
            'descripcion' => 'Torre gaming con Intel Core i7, 16GB RAM, GTX 1660',
            'precio' => 1099.50,
            'imagen_url' => 'https://example.com/images/hp_pavilion_gaming.jpg',
            'categoria_id' => 2, 
        ]);

        Producto::create([
            'nombre' => 'Monitor LG UltraWide 29"',
            'descripcion' => 'Monitor 21:9 Full HD, ideal para multitarea',
            'precio' => 249.90,
            'imagen_url' => 'https://example.com/images/lg_ultrawide.jpg',
            'categoria_id' => 3, 
        ]);

        Producto::create([
            'nombre' => 'Teclado Mecánico Logitech G513',
            'descripcion' => 'Teclado gaming mecánico con retroiluminación RGB',
            'precio' => 129.99,
            'imagen_url' => 'https://example.com/images/logitech_g513.jpg',
            'categoria_id' => 4, 
        ]);

        Producto::create([
            'nombre' => 'Disco Duro Externo Seagate 2TB',
            'descripcion' => 'Disco duro externo USB 3.0 para backups y almacenamiento',
            'precio' => 69.90,
            'imagen_url' => 'https://example.com/images/seagate_2tb.jpg',
            'categoria_id' => 5, 
        ]);
    }
}
