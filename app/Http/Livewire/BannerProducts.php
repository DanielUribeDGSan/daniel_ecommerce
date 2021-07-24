<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BannerProducts extends Component
{
    public $category;

    public function render()
    {
        return view('livewire.banner-products');
    }
}
