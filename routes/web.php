<?php

use App\Http\Controllers\WebController;
use App\Http\Livewire\ShoppingCart;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', [App\Http\Controllers\WebController::class, 'inicio'])->name('inicio');

Route::get('categorias/{category}', [App\Http\Controllers\CategoryController::class, 'categoria'])->name('categoria');

Route::get('productos/{product}', [App\Http\Controllers\ProductController::class, 'producto'])->name('producto');

Route::get('busqueda', [App\Http\Controllers\SearchController::class, 'busqueda'])->name('busqueda');

Route::get('carrito-de-compras', [App\Http\Controllers\ShoppingCartController::class, 'carrito'])->name('carrito');

Route::get('orden/crear', [App\Http\Controllers\OrderController::class, 'order'])->name('order');

// Route::get('carrito-de-compras', ShoppingCart::class);

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');


// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('web.inicio');
// })->name('dashboard');
