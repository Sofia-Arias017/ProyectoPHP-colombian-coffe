<?php

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model{
    protected $table = 'proveedores';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'contacto',
        'telefono',
        'email'
    ];
}