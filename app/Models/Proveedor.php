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
    public $incrementing = true; // Asegúrate que coincida con tu DB
    protected $keyType = 'int'; // O 'string' si usas UUIDs

// Para que Laravel sepa cómo encontrar proveedores por id_proveedor
    public function getRouteKeyName()
    {
        return 'id_proveedor';
    }
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
