<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class MenuMovil extends Component
{
    public function render()
    {
        $categories = Category::all();

        return view('livewire.menu-movil', compact('categories'));
    }
}
