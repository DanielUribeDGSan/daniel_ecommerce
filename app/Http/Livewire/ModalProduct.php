<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ModalProduct extends Component
{
    public $product;
    protected $listeners = ['showModalProduct'];

    public function showModalProduct($productId)
    {
        $this->reset('product');

        $this->product = Product::find($productId);
    }

    public function render()
    {
        return view('livewire.modal-product');
    }
}
