<?php
use App\Http\Controllers\Cat_prodController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;
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
Route::get('/users-profile/index',[ProfileController::class, 'index'])->name('users.index');


