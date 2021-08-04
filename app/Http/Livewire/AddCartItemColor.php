<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;
use Livewire\Component;


class AddCartItemColor extends Component
{
    public $product, $colors, $color_id;
    public $quantity = 0;
    public $qty = 1;
    public $options = [
        'size_id' => null
    ];
    public $product_clean = 0;


    public function mount()
    {
        $this->colors = $this->product->colors;
        $this->options['image'] = asset('assets/images/' . $this->product->images->first()->url);
    }

    public function changeColorId($value)
    {
        $this->color_id = $value;
        $color = $this->product->colors->find($value);
        $this->reset('qty');
        $this->quantity = qty_available($this->product->id, $color->id);
        $this->options['color'] = $color->name;
        $this->options['color_id'] = $color->id;
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
        $this->quantity = qty_available($this->product->id, $this->color_id);

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
            $this->quantity = qty_available($this->product->id, $this->color_id);
            $this->emit('render');
            $this->reset('qty');
        }
    }


    public function render()
    {
        return view('livewire.add-cart-item-color');
    }
}
