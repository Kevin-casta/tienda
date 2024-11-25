<?php

use App\Http\Controllers\DescuentoController;
use Illuminate\Support\Facades\Route;

Route::get('/descuento',[DescuentoController::class, 'index'])->name('descuento.index');
Route::get('/descuento/create',[DescuentoController::class, 'create'])->name('descuento.create');
Route::post('/descuento/create',[DescuentoController::class, 'store'])->name('descuento.store');
Route::get('/descuento/edit/{id}',[DescuentoController::class, 'edit'])->name('descuento.edit');
Route::put('/descuento/edit',[DescuentoController::class, 'update'])->name('descuento.update');
Route::delete('/descuento/delete/{id}',[DescuentoController::class, 'delete'])->name('descuento.delete');
