<?php

use App\Http\Controllers\ProductosController;
use Illuminate\Support\Facades\Route;

Route::get('/productos',[ProductosController::class, 'index']) ->name('productos.index');

Route::post('/productos/store', [ProductosController::class, 'store']) ->name('productos.store');


