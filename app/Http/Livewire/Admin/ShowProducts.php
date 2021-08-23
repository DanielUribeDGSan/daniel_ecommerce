<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;

class ShowProducts extends Component
{

    public function render()
    {
        $productos = Product::all();
        return view('livewire.admin.show-products', compact('productos'))->layout('layouts.admin');
    }
}
