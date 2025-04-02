<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('inicio', function () {
    return view('inicio');
});

Route::get('dashboard', function () {
    return view('dashboard');
});

Route::resource('clientes', \App\Http\Controllers\ClienteController::class);

Route::resource('detalle_ventas', \App\Http\Controllers\DetalleVentaController::class);

Route::resource('ventas', \App\Http\Controllers\VentaController::class);

Route::resource('productos', \App\Http\Controllers\ProductoController::class);

Route::resource('proveedores', \App\Http\Controllers\ProveedorController::class);

Route::get('/home', [\App\Http\Controllers\ClienteController::class, 'index'])->name('home');
