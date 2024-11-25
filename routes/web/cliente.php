<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;

Route::get('/cliente',[ClienteController::class, 'index'])->name('cliente.index');
Route::get('/cliente/create',[ClienteController::class, 'create'])->name('cliente.create');
Route::post('/cliente/create',[ClienteController::class, 'store'])->name('cliente.store');
Route::get('/cliente/edit/{id}',[ClienteController::class, 'edit'])->name('cliente.edit');
Route::put('/cliente/edit',[ClienteController::class, 'update'])->name('cliente.update');
Route::delete('/cliente/delete/{id}',[ClienteController::class, 'delete'])->name('cliente.delete');
