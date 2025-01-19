<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    public function run()
    {
        Categoria::create([
            'nombre' => 'Portátiles',
            'descripcion' => 'Ordenadores portátiles de diversas marcas y gamas',
        ]);

        Categoria::create([
            'nombre' => 'Sobremesa',
            'descripcion' => 'Ordenadores de escritorio, torres y all-in-one',
        ]);

        Categoria::create([
            'nombre' => 'Monitores',
            'descripcion' => 'Monitores de diferentes resoluciones y tamaños',
        ]);

        Categoria::create([
            'nombre' => 'Periféricos',
            'descripcion' => 'Ratones, teclados, auriculares, etc.',
        ]);

        Categoria::create([
            'nombre' => 'Almacenamiento',
            'descripcion' => 'Discos duros, SSD, memorias USB, tarjetas SD',
        ]);
    }
}