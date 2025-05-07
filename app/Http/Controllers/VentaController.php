<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Cliente;
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
        return view('ventas.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'fecha_venta' => 'required|date',
            'total' => 'required|numeric|min:0',
            'id_cliente' => 'nullable|exists:clientes,id_cliente',
            'estado' => 'required|in:pendiente,completada,cancelada'
        ]);

        Venta::create($validated);

        return redirect()->route('ventas.index')
            ->with('success', 'Venta registrada correctamente');
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
