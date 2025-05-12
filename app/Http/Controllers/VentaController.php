<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Cliente;
use App\Models\Producto;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::with('cliente')->latest()->paginate(10);
        return view('ventas.index', compact('ventas'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $productos = Producto::where('stock', '>', 0)->get();

        return view('ventas.create', compact('clientes', 'productos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'fecha_venta' => 'required|date',
            'id_cliente' => 'nullable|exists:clientes,id_cliente',
            'estado' => 'required|in:pendiente,completada,cancelada',
            'productos' => 'required|array|min:1',
            'productos.*.id' => 'required|exists:productos,id_producto',
            'productos.*.cantidad' => 'required|integer|min:1'
        ]);

        DB::beginTransaction();

        try {
            // Crear la venta
            $venta = Venta::create([
                'fecha_venta' => $validated['fecha_venta'],
                'id_cliente' => $validated['id_cliente'],
                'estado' => $validated['estado'],
                'total' => 0 // Temporal, se actualizará
            ]);

            // Agregar productos
            $total = 0;
            foreach ($validated['productos'] as $item) {
                $producto = Producto::find($item['id']);

                $subtotal = $producto->precio * $item['cantidad'];

                $venta->productos()->attach($producto->id, [
                    'cantidad' => $item['cantidad'],
                    'precio_unitario' => $producto->precio,
                    'subtotal' => $subtotal
                ]);

                $total += $subtotal;

                // Actualizar stock (opcional)
                $producto->decrement('stock', $item['cantidad']);
            }

            // Actualizar total
            $venta->update(['total' => $total]);

            DB::commit();

            return redirect()->route('ventas.index')
                ->with('success', 'Venta registrada correctamente');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error al registrar la venta: '.$e->getMessage());
        }
    }

    public function show(Venta $venta)
    {
        return view('ventas.show', compact('venta'));
    }

    public function edit(Venta $venta)
    {
        $clientes = Cliente::all();
        return view('ventas.edit', compact('venta', 'clientes'));
    }

    public function update(Request $request, Venta $venta)
    {
        $validated = $request->validate([
            'fecha_venta' => 'required|date',
            'total' => 'required|numeric|min:0',
            'id_cliente' => 'nullable|exists:clientes,id_cliente',
            'estado' => 'required|in:pendiente,completada,cancelada'
        ]);

        $venta->update($validated);

        return redirect()->route('ventas.index')
            ->with('success', 'Venta actualizada correctamente');
    }

    public function destroy(Venta $venta)
    {
        $venta->delete();
        return redirect()->route('ventas.index')
            ->with('success', 'Venta eliminada correctamente');
    }
}
