<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index()
    {
        $proveedores = Proveedor::all();
        return view('proveedores.index', compact('proveedores'));
    }

    public function create()
    {
        return view('proveedores.create');
    }

    public function store(Request $request)
    {
        Proveedor::create([
            "nombre_empresa" => $request->nombre_empresa,
            "contacto_nombre" => $request->contacto_nombre,
            "telefono" => $request->telefono,
            "email" => $request->email,
            "direccion" => $request->direccion,
            "ruc" => $request->ruc,
            "estado" => $request->estado,
        ]);
        return redirect()->route('proveedores.index');
    }

    public function show(Proveedor $proveedor)
    {
        return view('proveedores.show', compact('proveedor'));
    }

    public function edit(Proveedor $proveedor)
    {
        return view('proveedores.edit', compact('proveedor'));
    }

    public function update(Request $request, Proveedor $proveedor)
    {
        $proveedor->update([
            "nombre_empresa" => $request->nombre_empresa,
            "contacto_nombre" => $request->contacto_nombre,
            "telefono" => $request->telefono,
            "email" => $request->email,
            "direccion" => $request->direccion,
            "ruc" => $request->ruc,
            "estado" => $request->estado
        ]);
        return redirect()->route('proveedores.index');
    }

    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();
        return redirect()->route('proveedores.index');
    }
}
