<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CategoryProducts extends Component
{
    public $category;

    public $products = [];

    public function loadData()
    {
        $this->products = $this->category->products()->where('status', 2)->limit(10)->get();
        $this->emit('swiper', $this->category->id);
    }

    public function render()
    {
        return view('livewire.category-products');
    }
}
