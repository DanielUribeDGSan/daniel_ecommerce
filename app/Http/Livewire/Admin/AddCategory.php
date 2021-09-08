<?php

namespace App\Http\Livewire\Admin;

use App\Models\Brand;
use Livewire\Component;

class AddCategory extends Component
{
    public $name, $brand_id;
    public $brands;

    public $createForm = [
        'name' => null,
        'slug' => null,
        'icon' => null,
        'image' => null,
        'brands' => null
    ];

    protected $rules = [
        'name' => 'required|unique:categories',
    ];

    public function mount()
    {
        $this->getBrands();
    }

    public function getBrands()
    {
        $this->brands = Brand::all();
    }

    public function saveCategory()
    {
        $this->validate($this->rules);
    }

    public function render()
    {
        return view('livewire.admin.add-category');
    }
}
