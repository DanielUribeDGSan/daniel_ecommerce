<?php

namespace App\Http\Livewire;

use App\Models\Size;
use Livewire\Component;

class AddCartItemSize extends Component
{
    public $product, $sizes, $size_id;
    public $quantity = 0;
    public $qty = 1;
    public $colors = [];

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
        $this->sizes = $this->product->sizes;
    }

    public function render()
    {
        return view('livewire.add-cart-item-size');
    }

    public function changeSizeId($value)
    {
        $this->size_id = $value;
        $size = Size::find($value);
        $this->colors = $size->colors;
    }
    public function changeColorId($value)
    {
        $size = Size::find($this->size_id);
        $this->quantity = $size->colors->find($value)->pivot->quantity;
    }
}
