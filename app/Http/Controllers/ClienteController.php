<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', data:compact('clientes'));
        //dd($horas);
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        Cliente::create([
            "nombre"=>$request->nombre,
            "apellido"=>$request->apellido,
            "email"=>$request->email,
            "telefono"=>$request->telefono,
            "direccion"=>$request->direccion,
            "tipo_documento"=>$request->tipo_documento,
            "numero_documento"=>$request->numero_documento,
            "fecha_registro"=>$request->fecha_registro,
            "estado"=>$request->estado,
        ]);
        return redirect()->route('clientes.index');
    }

    public function show(Cliente $cliente)
    {
        return "Hola desde show";
    }

    public function edit(Cliente $cliente)
    {
        return view('clientes.edit',compact("cliente"));
    }


    public function update(Request $request, Cliente $cliente)
    {
        $cliente->update($request->all());
        return redirect()->route('clientes.index');
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index');
    }
}
