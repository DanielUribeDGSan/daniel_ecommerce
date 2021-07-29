<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddCartItemColor extends Component
{
    public $product, $colors, $color_id;
    public $quantity = 0;
    public $qty = 1;

    public function decrement()
    {
        $this->qty = $this->qty - 1;
    }

    public function increment()
    {
        $this->qty = $this->qty + 1;
    }

    public function mount()
    {
        $this->colors = $this->product->colors;
    }

    public function render()
    {
        return view('livewire.add-cart-item-color');
    }

    public function changeColorId($value)
    {
        $this->quantity = $this->product->colors->find($value)->pivot->quantity;
    }
}
