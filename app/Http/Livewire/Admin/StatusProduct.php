<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class StatusProduct extends Component
{
    public $product, $status;

    public function mount()
    {
        $this->status = $this->product->status;
    }

    public function saveStatus()
    {
        if ($this->product->images->count()) {
            $this->product->status = $this->status;
            $this->product->save();
            $this->emit('messageStatus', 'El estado del producto se ha cambiado');
        } else {
            $this->emit('messageStatusError');
        }
    }

    public function render()
    {
        return view('livewire.admin.status-product');
    }
}
