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


// Inicio
Route::get('/', [App\Http\Controllers\WebController::class, 'inicio'])->name('inicio');

// Categorias
Route::get('categorias/{category}', [App\Http\Controllers\CategoryController::class, 'categoria'])->name('categoria');

// Productos
Route::get('productos/{product}', [App\Http\Controllers\ProductController::class, 'producto'])->name('producto');

// Busuqeda
Route::get('busqueda', [App\Http\Controllers\SearchController::class, 'busqueda'])->name('busqueda');

// Carrito
Route::get('carrito-de-compras', [App\Http\Controllers\ShoppingCartController::class, 'carrito'])->name('carrito');

// Ordenes
Route::get('orden/crear', [App\Http\Controllers\OrderController::class, 'order'])->middleware('auth')->name('order');
Route::get('orden/{orden}/payment', [App\Http\Controllers\OrderController::class, 'orderPayment'])->middleware('auth')->name('orderPayment');

//Pagos
Route::get('pago/{orden}/pendiente', [App\Http\Controllers\PaymentController::class, 'pagoPendiente'])->middleware('auth')->name('pagoPendiente');
Route::get('pago/{orden}/rechazado', [App\Http\Controllers\PaymentController::class, 'pagoCancelado'])->middleware('auth')->name('pagoCancelado');
Route::get('pago/{orden}/exitoso', [App\Http\Controllers\PaymentController::class, 'pagoExitoso'])->middleware('auth')->name('pagoExitoso');

Route::post('webhooks', [App\Http\Controllers\WebhooksController::class, 'webhooks'])->middleware('auth')->name('webhooks');


// Route::get('carrito-de-compras', ShoppingCart::class);

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');


// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('web.inicio');
// })->name('dashboard');
