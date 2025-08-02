<?php

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model{
    protected $table = 'inventario';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'producto_id',
        'cantidad',
        'ubicacion',
        'fecha_actualizacion'
    ];
}