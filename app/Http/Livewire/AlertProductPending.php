<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class AlertProductPending extends Component
{
    public function render()
    {
        $pendiente = Order::where('status', 1)->where('user_id', auth()->user()->id)->count();
        return view('livewire.alert-product-pending', compact('pendiente'));
    }
}
