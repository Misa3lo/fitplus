<?php

namespace App\Http\Controllers;

use App\Models\DetalleVenta;
use App\Models\Venta;
use App\Models\Producto;
use Illuminate\Http\Request;

class DetalleVentaController extends Controller
{
    public function index()
    {
        $detalles = DetalleVenta::with(['venta', 'producto'])->paginate(10);
        return view('detalle_ventas.index', compact('detalles'));
    }

    public function create()
    {
        $ventas = Venta::all();
        $productos = Producto::all();
        return view('detalle_ventas.create', compact('ventas', 'productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_venta' => 'required|exists:ventas,id_venta',
            'id_producto' => 'required|exists:productos,id_producto',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric|min:0',
            'subtotal' => 'required|numeric|min:0'
        ]);

        DetalleVenta::create($request->all());

        return redirect()->route('detalle_ventas.index')
            ->with('success', 'Detalle de venta creado correctamente');
    }

    public function show(DetalleVenta $detalleVenta)
    {
        return view('detalle_ventas.show', compact('detalleVenta'));
    }

    public function edit(DetalleVenta $detalleVenta)
    {
        $ventas = Venta::all();
        $productos = Producto::all();
        return view('detalle_ventas.edit', compact('detalleVenta', 'ventas', 'productos'));
    }

    public function update(Request $request, DetalleVenta $detalleVenta)
    {
        $request->validate([
            'id_venta' => 'required|exists:ventas,id_venta',
            'id_producto' => 'required|exists:productos,id_producto',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric|min:0',
            'subtotal' => 'required|numeric|min:0'
        ]);

        $detalleVenta->update($request->all());

        return redirect()->route('detalle_ventas.index')
            ->with('success', 'Detalle de venta actualizado correctamente');
    }

    public function destroy(DetalleVenta $detalleVenta)
    {
        $detalleVenta->delete();
        return redirect()->route('detalle_ventas.index')
            ->with('success', 'Detalle de venta eliminado correctamente');
    }
}
