<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class ShowOrder extends Component
{
    public function render()
    {
        return view('livewire.admin.show-order')->layout('layouts.admin');
    }
}