<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;
use Livewire\Component;
use Alert;

class AddCartItem extends Component
{
    public $quantity, $product;
    public $qty = 1;
    public $options = [
        'color_id' => null,
        'size_id' => null
    ];
    public $product_clean = 0;


    public function mount()
    {
        $this->quantity = qty_available($this->product->id);
        $this->options['image'] = asset('assets/images/' . $this->product->images->first()->url);
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
        $this->quantity = qty_available($this->product->id);

        if ($this->qty > $this->quantity) {
            $this->emit('render');
            $this->reset('qty');
            $this->product_clean = 1;
        } else {
            FacadesCart::add([
                'id' => $this->product->id,
                'name' => $this->product->name,
                'qty' => $this->qty,
                'price' => $this->product->price,
                'weight' => 550,
                'options' => $this->options
            ]);
            $this->quantity = qty_available($this->product->id);
            $this->emit('render');
            $this->reset('qty');
        }
    }

    public function render()
    {
        return view('livewire.add-cart-item');
    }
}
