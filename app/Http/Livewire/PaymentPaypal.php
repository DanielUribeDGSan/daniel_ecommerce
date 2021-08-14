<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PaymentPaypal extends Component
{
    public $orden;

    protected $listeners = ['payOrder'];

    public function payOrder()
    {
        $this->orden->status = 2;
        $this->orden->save();

        return redirect()->route('pagoExitoso', $this->orden);
    }

    public function render()
    {
        $items = json_decode($this->orden->content);

        return view('livewire.payment-paypal', compact('items'));
    }
}
