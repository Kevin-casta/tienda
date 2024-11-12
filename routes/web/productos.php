<?php

use App\Http\Controllers\ProductosController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthorizedMiddleware;

Route::get('/productos',[ProductosController::class, 'index']) ->name('productos.index')
->middleware(AuthorizedMiddleware::class . ':Productos.showProductos');

Route::post('/productos/store', [ProductosController::class, 'store']) ->name('productos.store')
->middleware(AuthorizedMiddleware::class . ':Productos.store');


Route::get('/productos/create',[ProductosController::class, 'create'])->name('productos.create')
->middleware(AuthorizedMiddleware::class . ':Productos.create');
//Route::post('/productos/create',[ProductosController::class, 'store'])->name('productos.store');
Route::get('/productos/edit/{id}',[ProductosController::class, 'edit'])->name('productos.edit')
->middleware(AuthorizedMiddleware::class . ':Productos.edit');
Route::put('/productos/edit',[ProductosController::class, 'update'])->name('productos.update')
->middleware(AuthorizedMiddleware::class . ':Productos.update');
Route::delete('/productos/delete/{id}',[ProductosController::class, 'delete'])->name('productos.delete')
->middleware(AuthorizedMiddleware::class . ':Productos.update');


