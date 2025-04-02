<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "Hola desde index";//
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return "Hola desde create";//
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return "Hola desde store";//
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        return "Hola desde show";//
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        return "Hola desde edit";//
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        return "Hola desde update";//
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        return "Hola desde destroy";//
    }
}
