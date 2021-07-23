<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Subcategory;
use Livewire\Component;

class MenuPc extends Component
{
    public $categories = [];

    public function loadData()
    {
        $this->categories = Category::all();
    }

    public function render()
    {
        return view('livewire.menu-pc');
    }
}
