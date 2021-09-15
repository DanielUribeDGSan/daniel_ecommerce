<?php

namespace App\Http\Livewire\Admin;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class ShowEditCategory extends Component
{

    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['render', 'deleteCategory'];

    public $search, $brands, $category;
    public $editImage;

    public $editForm = [
        'name' => null,
        'slug' => null,
        'image' => null,
        'brands' => [],
    ];


    protected $validationAttributes = [
        'editForm.name' => 'nombre',
        'editImage' => 'imagen',
        'editForm.brands' => 'marcas',
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->getBrands();
    }

    public function edit(Category $category)
    {
        $this->reset(['editImage']);
        $this->category = $category;

        $this->editForm['name'] = $category->name;
        $this->editForm['slug'] = $category->slug;
        $this->editForm['image'] = $category->image;
        $this->editForm['brands'] = $category->brands->pluck('id');
    }

    public function updateCategory()
    {
        $rules = [
            'editForm.name' => 'required|unique:categories,name,' . $this->category->id,
            'editForm.brands' => 'required',
        ];

        if ($this->editImage) {
            $rules['editImage'] = 'required|image|max:2024';
        }

        $this->validate($rules);

        if ($this->editImage) {
            Storage::delete($this->editForm['image']);
            $this->editForm['image'] = $this->editImage->store('categories');
        }
        $this->editForm['slug'] = $this->editForm['slug'];

        $this->category->update($this->editForm);

        $this->category->update(
            [
                'name' => $this->editForm['name'],
                'slug' => Str::slug($this->editForm['name']),
            ]
        );
        $this->category->brands()->sync($this->editForm['brands']);
        $this->emit('messageUpdateCategory');
        $this->emit('render');
        $this->reset(['editForm', 'editImage']);
    }

    public function getBrands()
    {
        $this->brands = Brand::all();
    }

    public function deleteCategory(Category $category)
    {
        $category->delete();
        $this->emit('render');
    }

    public function render()
    {
        $categories = Category::where('name', 'like', '%' . $this->search . '%')->orderByRaw('name ASC')->paginate(10);

        return view('livewire.admin.show-edit-category', compact(('categories')))->layout('layouts.admin');
    }
}
