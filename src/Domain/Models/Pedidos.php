<?php

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model{
    protected $table = 'pedidos';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'usuario_id',
        'fecha_pedido',
        'total',
        'estado'
    ];
}