<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ShowProducts extends Component
{
    public $search;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['render'];


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $productos = Product::where('name', 'like', '%' . $this->search . '%')->paginate(10);
        return view('livewire.admin.show-products', compact('productos'))->layout('layouts.admin');
    }
}
