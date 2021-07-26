<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function producto(Product $product)
    {
        return view('productos.producto', compact('product'));
    }
}
