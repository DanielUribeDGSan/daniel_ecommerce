<?php


use App\Http\Controllers\Admin\ProductController;
use App\Http\Livewire\Admin\EditProduct;
use App\Http\Livewire\Admin\Home;
use App\Http\Livewire\Admin\ShowEditBrand;
use App\Http\Livewire\Admin\ShowEditCategory;
use App\Http\Livewire\Admin\ShowEditSubcategory;
use App\Http\Livewire\Admin\ShowProducts;
use Illuminate\Support\Facades\Route;

Route::get('inicio', Home::class)->name('admin.inicio');
Route::get('productos', ShowProducts::class)->name('admin.productos');
Route::get('productos/{product}/edit', EditProduct::class)->name('admin.products.edit');

Route::post('productos/{product}/files', [ProductController::class, 'files'])->name('admin.products.files');

// Route::get('categorias', [CategoryController::class, 'category'])->name('admin.category');
Route::get('categorias', ShowEditCategory::class)->name('admin.category');
Route::get('categorias/{category}', ShowEditSubcategory::class)->name('admin.category.show');

Route::get('marcas', ShowEditBrand::class)->name('admin.marca');
