<?php

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model{
    protected $table = 'productos';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'precio',
        'stock',
        'categoria',
        'sku'
    ];
}