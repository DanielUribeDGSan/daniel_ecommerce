<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;
use Livewire\Component;

class AddCartItem extends Component
{
    public $quantity;
    public $qty = 1;
    public $product;
    public $options = [];

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
        $this->quantity = $this->product->quantity;
        $this->options['image'] = asset('assets/images/' . $this->product->images->first()->url);
    }

    public function addItem()
    {
        FacadesCart::add([
            'id' => $this->product->id,
            'name' => $this->product->name,
            'qty' => $this->qty,
            'price' => $this->product->price,
            'weight' => 550,
            'options' => $this->options
        ]);
        $this->emitTo('menu-cart', 'render');
        $this->emitTo('icon-cart', 'render');
    }

    public function render()
    {
        return view('livewire.add-cart-item');
    }
}
