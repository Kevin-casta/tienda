<?php

use App\Http\Controllers\Cat_prodController;
use Illuminate\Support\Facades\Route;

Route::get('/categoria',[Cat_prodController::class, 'index'])->name('categoria.index');
Route::get('/categoria/create',[Cat_prodController::class, 'create'])->name('categoria.create');
Route::post('/categoria/create',[Cat_prodController::class, 'store'])->name('categoria.store');
Route::get('/categoria/edit/{id}',[Cat_prodController::class, 'edit'])->name('categoria.edit');
Route::put('/categoria/edit',[Cat_prodController::class, 'update'])->name('categoria.update');
Route::delete('/categoria/delete/{id}',[Cat_prodController::class, 'delete'])->name('categoria.delete');
