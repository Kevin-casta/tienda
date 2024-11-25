<?php

use App\Http\Controllers\PromocionController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthorizedMiddleware;

Route::get('/promocion',[PromocionController::class, 'index']) ->name('promocion.index')
->middleware(AuthorizedMiddleware::class . ':promocions.showProductos');

Route::post('/promocions/store', [PromocionController::class, 'store']) ->name('promocions.store')
->middleware(AuthorizedMiddleware::class . ':promocions.store');


Route::get('/promocions/create',[PromocionController::class, 'create'])->name('promocions.create')
->middleware(AuthorizedMiddleware::class . ':promocions.create');
//Route::post('/promocions/create',[PromocionController::class, 'store'])->name('promocions.store');
Route::get('/promocions/edit/{id}',[PromocionController::class, 'edit'])->name('promocions.edit')
->middleware(AuthorizedMiddleware::class . ':promocions.edit');
Route::put('/promocions/edit',[PromocionController::class, 'update'])->name('promocions.update')
->middleware(AuthorizedMiddleware::class . ':promocions.update');
Route::delete('/promocions/delete/{id}',[PromocionController::class, 'delete'])->name('promocions.delete')
->middleware(AuthorizedMiddleware::class . ':promocions.update');


