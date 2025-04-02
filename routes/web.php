<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('inicio', function () {
    return view('inicio');
});

Route::resource('clientes', \App\Http\Controllers\ClienteController::class);

Route::get('/home', [\App\Http\Controllers\ClienteController::class, 'index'])->name('home');
