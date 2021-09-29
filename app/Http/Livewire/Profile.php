<?php

namespace App\Http\Livewire;

use App\Models\Address;
use App\Models\Order;
use Livewire\Component;

class Profile extends Component
{

    public $address = [], $orders = [];

    public function mount()
    {
        $this->address = Address::where('user_id', auth()->user()->id)->first();
        $this->orders = Order::where('user_id', auth()->user()->id)->where('status', 2)->get();
    }

    public function render()
    {
        return view('livewire.profile')->layout('layouts.web');
    }
}
