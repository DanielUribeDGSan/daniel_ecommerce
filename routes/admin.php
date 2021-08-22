<?php

use App\Http\Livewire\Admin\Home;
use App\Http\Livewire\Admin\ShowProducts;
use Illuminate\Support\Facades\Route;

Route::get('/inicio', Home::class)->name('admin.inicio');
Route::get('/productos', ShowProducts::class)->name('admin.productos');
