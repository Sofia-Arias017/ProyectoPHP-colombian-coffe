<?php

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class DetallesPedidos extends Model{
    protected $table = 'detalles_pedido';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'pedido_id',
        'producto_id',
        'cantidad',
        'precio_unitario'
    ];
}