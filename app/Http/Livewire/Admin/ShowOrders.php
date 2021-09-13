<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;


class ShowOrders extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $todas = Order::where('contact', 'like', '%' . $this->search . '%')->orderByRaw('created_at DESC')->paginate(10);

        $pendiente = Order::where('contact', 'like', '%' . $this->search . '%')->where('status', 1)->orderByRaw('created_at DESC')->paginate(10);
        $recibido = Order::where('contact', 'like', '%' . $this->search . '%')->where('status', 2)->orderByRaw('created_at DESC')->paginate(10);
        $enviado = Order::where('contact', 'like', '%' . $this->search . '%')->where('status', 3)->orderByRaw('created_at DESC')->paginate(10);
        $entregado = Order::where('contact', 'like', '%' . $this->search . '%')->where('status', 4)->orderByRaw('created_at DESC')->paginate(10);
        $anulado = Order::where('contact', 'like', '%' . $this->search . '%')->where('status', 5)->orderByRaw('created_at DESC')->paginate(10);

        return view('livewire.admin.show-orders', compact('todas', 'pendiente', 'recibido', 'enviado', 'entregado', 'anulado'))->layout('layouts.admin');
    }
}
