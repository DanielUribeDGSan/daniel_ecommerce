<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;

class ShoppingCart extends Component
{

    protected $listeners = ['render'];

    public function destroy()
    {
        FacadesCart::destroy();
        $this->emit('render');
    }
    public function delete($rowId)
    {
        FacadesCart::remove($rowId);
        $this->emit('render');
    }

    public function render()
    {
        return view('livewire.shopping-cart');
    }
}
