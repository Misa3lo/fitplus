<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        Producto::create([
            "nombre" => $request->nombre,
            "descripcion" => $request->descripcion,
            "precio" => $request->precio,
            "stock" => $request->stock,
            "categoria" => $request->categoria,
            "codigo_barras" => $request->codigo_barras,
            "estado" => $request->estado,
        ]);
        return redirect()->route('productos.index');
    }

    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, Producto $producto)
    {
        $producto->update([
            "nombre" => $request->nombre,
            "descripcion" => $request->descripcion,
            "precio" => $request->precio,
            "stock" => $request->stock,
            "categoria" => $request->categoria,
            "codigo_barras" => $request->codigo_barras,
            "estado" => $request->estado,
        ]);
        return redirect()->route('productos.index');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index');
    }
}
