<?php

use App\Http\Livewire\Profile;
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

// Nosotros
Route::get('/nosotros', [App\Http\Controllers\WebController::class, 'nosotros'])->name('nosotros');

// Contacto
Route::get('/contacto', [App\Http\Controllers\WebController::class, 'contacto'])->name('contacto');

// Categorias
Route::get('categorias/{category}/{subcategory?}', [App\Http\Controllers\CategoryController::class, 'categoria'])->name('categoria');

// Productos
Route::get('productos/{product}', [App\Http\Controllers\ProductController::class, 'producto'])->name('producto');

// Busuqeda
Route::get('busqueda', [App\Http\Controllers\SearchController::class, 'busqueda'])->name('busqueda');

// Carrito
Route::get('carrito-de-compras', [App\Http\Controllers\ShoppingCartController::class, 'carrito'])->name('carrito');

Route::post('webhooks', [App\Http\Controllers\WebhooksController::class, 'webhooks'])->name('webhooks');

Route::middleware(['auth'])->group(function () {
    // Ordenes
    Route::get('orden/crear', [App\Http\Controllers\OrderController::class, 'order'])->name('order');
    Route::get('orden/{orden}/payment', [App\Http\Controllers\OrderController::class, 'orderPayment'])->name('orderPayment');
    Route::get('orden/{orden}', [App\Http\Controllers\OrderController::class, 'viewOrder'])->name('viewOrder');
    Route::get('ordenes', [App\Http\Controllers\OrderController::class, 'ordenes'])->name('ordenes');

    //Pagos
    Route::get('pago/{orden}/pendiente', [App\Http\Controllers\PaymentController::class, 'pagoPendiente'])->name('pagoPendiente');
    Route::get('pago/{orden}/rechazado', [App\Http\Controllers\PaymentController::class, 'pagoCancelado'])->name('pagoCancelado');
    Route::get('pago/{orden}/exitoso', [App\Http\Controllers\PaymentController::class, 'pagoExitoso'])->name('pagoExitoso');


    //Perfil
    Route::get('perfil', Profile::class)->name('perfil');
});



// Route::get('carrito-de-compras', ShoppingCart::class);

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');


// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('web.inicio');
// })->name('dashboard');
