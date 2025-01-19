<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'imagen_url',
        'categoria_id'
    ];

    // Relación muchos a uno con categoría
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    // Relación muchos a muchos con pedidos a través de 'detalles_pedidos'
    public function pedidos()
    {
        return $this->belongsToMany(
            Pedido::class,
            'detalles_pedidos',
            'producto_id',
            'pedido_id'
        )->withPivot(['cantidad', 'precio_unitario']);
    }

    // Relación uno a uno 
    public function inventario()
    {
        return $this->hasOne(Inventario::class, 'producto_id');
    }
}
