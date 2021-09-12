<?php

namespace App\Http\Livewire\Admin;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class ShowEditBrand extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $brand, $search;

    protected $listeners = ['render', 'deleteBrand'];

    public $editForm = [
        'name' => null,

    ];

    protected $validationAttributes = [
        'editForm.name' => 'nombre',
    ];

    public function deleteBrand(Brand $brand)
    {
        $brand->delete();
        $this->emit('render');
    }

    public function edit(Brand $brand)
    {
        $this->brand = $brand;

        $this->editForm['name'] = $brand->name;
    }

    public function editBrand()
    {
        $rules = [
            'editForm.name' => 'required|unique:brands,name,' . $this->brand->id,
        ];

        $this->validate($rules);

        $this->brand->update(
            [
                'name' => $this->editForm['name'],
            ]
        );

        $this->emit('messageUpdateBrands');
        $this->emit('render');
        $this->reset(['editForm']);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $brands = Brand::where('name', 'like', '%' . $this->search . '%')->orderByRaw('name ASC')->paginate(10);

        return view('livewire.admin.show-edit-brand', compact('brands'))->layout('layouts.admin');
    }
}
