<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categoria(Category $category, Subcategory $subcategory)
    {
        return view('categorias.categoria-page', compact('category', 'subcategory'));
    }
}
