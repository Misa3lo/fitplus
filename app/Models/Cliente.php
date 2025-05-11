<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use softDeletes;

    protected $table = 'clientes';
    protected $primaryKey = 'id_cliente';
    protected $fillable = ["nombre","apellido","email","telefono","direccion","tipo_documento","numero_documento","fecha_registro","estado"];
    public $incrementing = false; // Si id_cliente no es autoincremental
    protected $keyType = 'string'; // Si id_cliente no es entero

}
