<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class AlertProductPending extends Component
{
    public function render()
    {
        // setcookie("productos_pendientes", "Hay productos pendientes", time() - 60);
        if (auth()->user()) {
            if (!isset($_COOKIE['productos_pendientes'])) {
                setcookie("productos_pendientes", "Hay productos pendientes", time() + 3600);
                $pendiente = Order::where('status', 1)->where('user_id', auth()->user()->id)->count();
                return view('livewire.alert-product-pending', compact('pendiente'));
            } else {
                $pendiente = "";
                return view('livewire.alert-product-pending', compact('pendiente'));
            }
        } else {
            $pendiente = "";
            return view('livewire.alert-product-pending', compact('pendiente'));
        }
    }
}
