<?php

namespace App\Http\Livewire\Admin;

use App\Models\Brand;
use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AddCategory extends Component
{
    use WithFileUploads;
    public $brands, $image_rand;

    public $createForm = [
        'name' => null,
        'slug' => null,
        'image' => null,
        'brands' => [],
    ];


    protected $rules = [
        'createForm.name' => 'required|unique:categories,name',
        'createForm.image' => 'required|image|max:2024',
        'createForm.brands' => 'required',

    ];

    protected $validationAttributes = [
        'createForm.name' => 'nombre',
        'createForm.image' => 'imagen',
        'createForm.brands' => 'marcas',
    ];

    public function mount()
    {
        $this->getBrands();
        $this->image_rand = rand();
    }

    public function getBrands()
    {
        $this->brands = Brand::all();
    }

    public function saveCategory()
    {;
        $this->validate();

        $imagen = $this->createForm['image']->store('categories');

        $category = Category::create([
            'name' => $this->createForm['name'],
            'slug' => Str::slug($this->createForm['name']),
            'image' => $imagen,
        ]);

        $category->brands()->attach($this->createForm['brands']);

        $this->image_rand = rand();
        $this->reset('createForm');
        $this->emit('newCategory');
        $this->emit('render');
    }

    public function render()
    {
        return view('livewire.admin.add-category');
    }
}
