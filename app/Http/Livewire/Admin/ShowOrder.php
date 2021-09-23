<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;

class ShowOrder extends Component
{
    public $order;

    public function mount(Order $order)
    {
        $this->order = $order;
    }

    public function render()
    {
        return view('livewire.admin.show-order')->layout('layouts.admin');
    }
}
