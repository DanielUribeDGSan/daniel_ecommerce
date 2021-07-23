<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function inicio()
    {
        $categories = Category::all();
        return view('web.inicio', compact('categories'));
    }
}
