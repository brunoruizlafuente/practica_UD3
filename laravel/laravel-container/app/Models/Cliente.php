<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'direccion_envio',
        'direccion_facturacion',
        'telefono'
    ];

    // Relación uno a muchos con Pedidos
    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'cliente_id');
    }
}
