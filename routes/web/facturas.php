<?php

use App\Http\Controllers\FacturasController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthorizedMiddleware;

Route::get('/factura',[FacturasController::class, 'index']) ->name('factura.index')
->middleware(AuthorizedMiddleware::class . ':facturas.showProductos');

Route::post('/facturas/store', [FacturasController::class, 'store']) ->name('facturas.store')
->middleware(AuthorizedMiddleware::class . ':facturas.store');


Route::get('/facturas/create',[FacturasController::class, 'create'])->name('facturas.create')
->middleware(AuthorizedMiddleware::class . ':facturas.create');
//Route::post('/newSale/create',[FacturasController::class, 'store'])->name('newSale.store');
Route::get('/facturas/edit/{id}',[FacturasController::class, 'edit'])->name('facturas.edit')
->middleware(AuthorizedMiddleware::class . ':facturas.edit');
Route::put('/facturas/edit',[FacturasController::class, 'update'])->name('facturas.update')
->middleware(AuthorizedMiddleware::class . ':facturas.update');
Route::delete('/facturas/delete/{id}',[FacturasController::class, 'delete'])->name('facturas.delete')
->middleware(AuthorizedMiddleware::class . ':facturas.delete');


