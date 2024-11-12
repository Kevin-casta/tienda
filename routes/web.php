<?php

use App\Http\Controllers\ProductosController;
use App\Http\Controllers\Cat_prodController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/productos',[ProductosController::class, 'index']);
Route::get('/productos/create',[ProductosController::class, 'create'])->name('productos.create');
Route::post('/productos/create',[ProductosController::class, 'store'])->name('productos.store');
Route::get('/productos/edit/{id}',[ProductosController::class, 'edit'])->name('productos.edit');
Route::put('/productos/edit',[ProductosController::class, 'update'])->name('productos.update');
Route::delete('/productos/delete/{id}',[ProductosController::class, 'delete'])->name('productos.delete');
Route::get('/categoria',[Cat_prodController::class, 'index']);
Route::get('/categoria/create',[Cat_prodController::class, 'create'])->name('categoria.create');
Route::post('/categoria/create',[Cat_prodController::class, 'store'])->name('categoria.store');
Route::get('/categoria/edit/{id}',[Cat_prodController::class, 'edit'])->name('categoria.edit');
Route::put('/categoria/edit',[Cat_prodController::class, 'update'])->name('categoria.update');
Route::delete('/categoria/delete/{id}',[Cat_prodController::class, 'delete'])->name('categoria.delete');

