<?php

namespace App\Http\Livewire;

use App\Models\Size;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;
use Alert;


class AddCartItemSize extends Component
{
    public $product, $sizes, $color_id, $size_id;
    public $quantity = 0;
    public $qty = 1;
    public $colors = [];
    public $options = [];



    public function mount()
    {
        $this->sizes = $this->product->sizes;
        $this->options['image'] = asset('assets/images/' . $this->product->images->first()->url);
    }

    public function changeSizeId($value)
    {
        $this->reset('qty');
        $this->size_id = $value;
        $size = Size::find($value);
        $this->colors = $size->colors;
        $this->options['size'] = $size->name;
    }

    public function changeColorId($value)
    {
        $this->reset('qty');
        $this->color_id = $value;
        $size = Size::find($this->size_id);
        $color = $size->colors->find($value);
        $this->quantity = qty_available($this->product->id, $color->id, $size->id);
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
        $this->quantity = qty_available($this->product->id, $this->color_id, $this->size_id);

        if ($this->qty > $this->quantity) {
            $this->emitTo('menu-cart', 'render');
            $this->emitTo('icon-cart', 'render');
            $this->reset('qty');
            alert()->warning('Producto agotado', 'Este producto no esta disponible')->showConfirmButton('Aceptar');
        } else {
            FacadesCart::add([
                'id' => $this->product->id,
                'name' => $this->product->name,
                'qty' => $this->qty,
                'price' => $this->product->price,
                'weight' => 550,
                'options' => $this->options
            ]);
            $this->quantity = qty_available($this->product->id, $this->color_id, $this->size_id);
            $this->emitTo('menu-cart', 'render');
            $this->emitTo('icon-cart', 'render');
            $this->reset('qty');
        }
    }

    public function render()
    {
        return view('livewire.add-cart-item-size');
    }
}
