<?php
use App\Http\Controllers\Cat_prodController;
use App\Http\Controllers\Det_FactController;
use App\Http\Controllers\FacturasController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\PromocionController;
use App\Models\detalle_factura;
use Pest\Plugins\Profile;

//Route::get('/dashboard', function () {
  //  return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

include('web/home.php');
include('web/productos.php');
include('web/categoria.php');
include('web/descuento.php');
include('web/cliente.php');
include('web/promocions.php');


Route::get('/productos/create',[ProductosController::class, 'create'])->name('productos.create');
Route::post('/productos/create',[ProductosController::class, 'store'])->name('productos.store');
Route::get('/productos/edit/{id}',[ProductosController::class, 'edit'])->name('productos.edit');
Route::put('/productos/edit',[ProductosController::class, 'update'])->name('productos.update');
Route::delete('/productos/delete/{id}',[ProductosController::class, 'delete'])->name('productos.delete');

Route::get('/users-profile/index',[ProfileController::class, 'index'])->name('users.index');

Route::get('/promocions/create',[PromocionController::class, 'create'])->name('promocions.create');
Route::post('/promocions/create',[PromocionController::class, 'store'])->name('promocions.store');
Route::get('/promocions/edit/{id}',[PromocionController::class, 'edit'])->name('promocions.edit');
Route::put('/promocions/edit',[PromocionController::class, 'update'])->name('promocions.update');
Route::delete('/promocions/delete/{id}',[PromocionController::class, 'delete'])->name('promocions.delete');

Route::post('/newSale/store',[FacturasController::class, 'store'])->name('facturas.store');

Route::get('/newSale/sale',[Det_FactController::class, 'create'])->name('facturas.create');
Route::post('/newSale/detalle',[Det_FactController::class, 'store'])->name('det_facturas.store');

Route::get('/newSale/sale',[FacturasController::class, 'create'])->name('facturas.create');
Route::post('/newSale/sale',[FacturasController::class, 'store'])->name('facturas.store');





