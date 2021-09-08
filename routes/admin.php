<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Livewire\Admin\CreateCategory;
use App\Http\Livewire\Admin\EditProduct;
use App\Http\Livewire\Admin\Home;
use App\Http\Livewire\Admin\ShowProducts;
use Illuminate\Support\Facades\Route;

Route::get('inicio', Home::class)->name('admin.inicio');
Route::get('productos', ShowProducts::class)->name('admin.productos');
Route::get('productos/{product}/edit', EditProduct::class)->name('admin.products.edit');

Route::post('productos/{product}/files', [ProductController::class, 'files'])->name('admin.products.files');

// Route::get('categorias', [CategoryController::class, 'category'])->name('admin.category');
Route::get('categorias', CreateCategory::class)->name('admin.category');
