<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;
use Livewire\Component;


class AddCartItemColor extends Component
{
    public $product, $colors, $color_id;
    public $quantity = 0;
    public $qty = 1;
    public $options = [];

    public function mount()
    {
        $this->colors = $this->product->colors;
        $this->options['image'] = asset('assets/images/' . $this->product->images->first()->url);
    }

    public function changeColorId($value)
    {
        $color = $this->product->colors->find($value);
        $this->qty = 1;
        $this->quantity = $color->pivot->quantity;
        $this->options['color'] = $color->name;
    }

    public function decrement()
    {
        $this->qty = $this->qty - 1;
    }

    public function increment()
    {
        $this->qty = $this->qty + 1;
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
        return view('livewire.add-cart-item-color');
    }
}
