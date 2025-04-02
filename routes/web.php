<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('cliente', \App\Http\Controllers\ClienteController::class);

Route::get('/home', [\App\Http\Controllers\ClienteController::class, 'index'])->name('home');
