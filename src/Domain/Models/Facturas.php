<?php

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class Facturas extends Model{
    protected $table = 'facturas';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'pedido_id',
        'fecha_emision',
        'subtotal',
        'impuestos',
        'total',
        'estado_pago'
    ];
}