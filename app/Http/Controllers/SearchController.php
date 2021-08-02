<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function busqueda($product)
    {
        return view('busquedas.busqueda', compact('product'));
    }
}
