<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categorias';

    // Campos rellenables
    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    // Relación uno a muchos con productos
    public function productos()
    {
        return $this->hasMany(Producto::class, 'categoria_id');
    }
}
