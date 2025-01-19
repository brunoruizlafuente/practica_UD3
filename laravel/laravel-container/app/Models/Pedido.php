<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedidos';

    protected $fillable = [
        'cliente_id',
        'fecha_pedido',
        'estado',
    ];

    // Relación muchos a uno con Cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    // Relación muchos a muchos con Productos (a través de detalles_pedidos)
    public function productos()
    {
        return $this->belongsToMany(
            Producto::class,
            'detalles_pedidos',
            'pedido_id',
            'producto_id'
        )->withPivot(['cantidad', 'precio_unitario']);
    }
}
