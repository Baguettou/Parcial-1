<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CarritoController;

// Route::get('/', 'ProductoController@index', function () {
//     return view('productos.index');
// });

// Route::get('/', 'ProductoController@index')->name('productos.index');

Route::get('/', [ProductoController::class, 'index'])->name('productos.index');

// Route::get('/productos/{id}', 'ProductoController@show')->name('productos.show');

Route::get('/productos/{id}', [ProductoController::class, 'show'])->name('productos.show');

// Route::get('/carrito', 'CarritoController@index')->name('carrito.index');

Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');

// Route::post('/carrito/agregar/{id}', 'CarritoController@agregar')->name('carrito.agregar');

Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');

Route::delete('/carrito/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');

Route::get('/carrito/resumen', [CarritoController::class, 'resumen'])->name('carrito.resumen');

Route::post('/comprar', [CarritoController::class, 'comprar'])->name('comprar');

Route::delete('/carrito', [CarritoController::class, 'limpiar'])->name('carrito.limpiar');
