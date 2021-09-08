<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    public function files(Product $product, Request $request)
    {
        $request->validate(['file' => 'required|image|max:2048']);

        if ($request->hasFile("file")) {
            $imagen = $request->file("file");
            $nombreimagen   = Str::slug($request->file("file")) . "." . $imagen->guessExtension();
            $ruta = public_path('assets/images/products');

            $imagen->move($ruta, $nombreimagen);
            $imageUrl =   'products/' . $nombreimagen;

            $product->images()->create([
                'url' => $imageUrl
            ]);
        }
    }
}
