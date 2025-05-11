<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $table = 'ventas';
    protected $primaryKey = 'id_venta';

    protected $fillable = [
        'fecha_venta',
        'total',
        'id_cliente',
        'estado',
        // Agrega otros campos que necesites
    ];

    protected $casts = [
        'fecha_venta' => 'date',
        'total' => 'decimal:2'
    ];

    // Relación opcional con cliente (si existe)
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'venta_producto')
            ->withPivot('cantidad', 'precio_unitario', 'subtotal')
            ->withTimestamps();
    }
    //Metodo para calcular el total de la venta
    public function calcularTotal()
    {
        return $this->productos->sum('pivot.subtotal');
    }
}
