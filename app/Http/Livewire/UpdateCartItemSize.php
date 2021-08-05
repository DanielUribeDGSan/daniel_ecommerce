<?php

namespace App\Http\Livewire;

use App\Models\Color;
use App\Models\Size;
use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;
use Livewire\Component;

class UpdateCartItemSize extends Component
{
    public $rowId, $qty, $quantity;
    public $product_clean = 0;

    // protected $listeners = ['render'];



    public function mount()
    {
        $item = FacadesCart::get($this->rowId);
        $this->qty = $item->qty;
        $color = Color::where('name', $item->options->color)->first();
        $size = Size::where('name', $item->options->size)->first();
        $this->quantity = qty_available($item->id, $color->id, $size->id);
    }

    public function decrement()
    {
        $this->qty = $this->qty - 1;
        FacadesCart::update($this->rowId, $this->qty);
        $this->emit('render');
    }

    public function increment()
    {
        $item = FacadesCart::get($this->rowId);
        $color = Color::where('name', $item->options->color)->first();
        $size = Size::where('name', $item->options->size)->first();
        $this->quantity = qty_available($item->id, $color->id, $size->id);

        if ($this->qty > $this->quantity) {
            $this->product_clean = 1;
        } else {
            $this->qty = $this->qty + 1;
            FacadesCart::update($this->rowId, $this->qty);
        }
        $this->emit('render');
    }

    public function render()
    {
        return view('livewire.update-cart-item-size');
    }
}
