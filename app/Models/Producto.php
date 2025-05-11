<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'productos';
    protected $primaryKey = 'id_producto';
    protected $fillable = [
        'nombre', 'descripcion', 'precio', 'stock',
        'categoria', 'codigo_barras', 'estado'
    ];

    // Añade esto si id_producto no es autoincremental
    public $incrementing = false;
    protected $keyType = 'string';

    // Casts para asegurar tipos de datos
    protected $casts = [
        'precio' => 'float',
        'stock' => 'integer',
        'estado' => 'string'
    ];
}
