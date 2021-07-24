<?php

namespace App\Http\Livewire;

use Livewire\Component;

class GridProducts extends Component
{
    public $category;

    public $products = [];

    public function loadData()
    {
        $this->products = $this->category->products()->where('status', 2)->get();
    }

    public function render()
    {
        return view('livewire.grid-products');
    }
}
