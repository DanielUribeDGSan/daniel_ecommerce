<?php

namespace App\Http\Livewire\Admin;

use App\Models\Brand;
use Livewire\Component;

class AddBrand extends Component
{
    public $brand;

    public $createForm = [
        'name' => null,
    ];

    protected $rules = [
        'createForm.name' => 'required|unique:brands,name',
    ];

    protected $validationAttributes = [
        'createForm.name' => 'nombre',
    ];


    public function saveBrand()
    {
        $this->validate();

        Brand::create(
            [
                'name' => $this->createForm['name'],
            ]
        );
        $this->reset('createForm');
        $this->emit('newBrand');
        $this->emit('render');
    }

    public function render()
    {
        return view('livewire.admin.add-brand');
    }
}
