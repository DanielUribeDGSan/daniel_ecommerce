<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;


class CreateCategory extends Component
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
        $categories = Category::where('name', 'like', '%' . $this->search . '%')->orderByRaw('name ASC')->paginate(10);

        return view('livewire.admin.create-category', compact(('categories')))->layout('layouts.admin');
    }
}
