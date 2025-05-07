<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedor extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'proveedores';
    protected $primaryKey = 'id_proveedor';
    protected $fillable = [
        'nombre_empresa',
        'contacto_nombre',
        'telefono',
        'email',
        'direccion',
        'ruc',
        'estado'
    ];

    protected $dates = ['fecha_registro', 'deleted_at'];
}
