<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function busqueda(Request $request)
    {
        $busqueda = $request->search;
        return view('busquedas.busqueda-page', compact('busqueda'));
    }
}
