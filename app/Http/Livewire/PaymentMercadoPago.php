<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PaymentMercadoPago extends Component
{
    public $orden;

    public function render()
    {
        $items = json_decode($this->orden->content);

        return view('livewire.payment-mercado-pago', compact('items'));
    }
}
