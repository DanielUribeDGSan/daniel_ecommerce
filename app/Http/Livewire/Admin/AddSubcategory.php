<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class AddSubcategory extends Component
{
    public $category;

    public $createForm = [
        'name' => null,
        'color' => false,
        'size' => false,
    ];

    protected $rules = [
        'createForm.name' => 'required',
        'createForm.color' => 'required',
        'createForm.size' => 'required',
    ];

    protected $validationAttributes = [
        'createForm.name' => 'nombre',
        'createForm.color' => 'color',
        'createForm.size' => 'talla',
    ];


    public function mount(Category $category)
    {
        $this->category = $category;
    }


    public function saveSubcategory()
    {
        $this->validate();

        $this->category->subcategories()->create(
            [
                'name' => $this->createForm['name'],
                'slug' => Str::slug($this->createForm['name']),
                'color' => $this->createForm['color'],
                'size' => $this->createForm['size'],
            ]
        );
        $this->reset('createForm');
        $this->emit('newSubcategory');
        $this->emit('render');
    }

    public function render()
    {
        return view('livewire.admin.add-subcategory');
    }
}
