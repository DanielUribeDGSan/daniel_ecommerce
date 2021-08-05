<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;
use Livewire\Component;

class MenuCart extends Component
{
    protected $listeners = ['render'];

    public function delete($rowId)
    {
        FacadesCart::remove($rowId);
        $this->emit('render');
    }

    public function render()
    {
        return view('livewire.menu-cart');
    }
}
