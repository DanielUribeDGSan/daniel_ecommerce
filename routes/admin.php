<?php

use App\Http\Livewire\Admin\EditProduct;
use App\Http\Livewire\Admin\Home;
use App\Http\Livewire\Admin\ShowProducts;
use Illuminate\Support\Facades\Route;

Route::get('inicio', Home::class)->name('admin.inicio');
Route::get('productos', ShowProducts::class)->name('admin.productos');
Route::get('productos/{product}/edit', EditProduct::class)->name('admin.products.edit');
