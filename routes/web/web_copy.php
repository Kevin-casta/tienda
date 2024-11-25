<?php

use App\Http\Controllers\ProductosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

include('web/productos.php');
include('web/categoria.php');
include('web/descuento.php');
include('web/cliente.php');


