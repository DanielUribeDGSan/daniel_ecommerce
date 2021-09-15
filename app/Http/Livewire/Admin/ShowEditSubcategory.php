<?php

namespace App\Http\Livewire\Admin;


use App\Models\Category;
use App\Models\Subcategory;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class ShowEditSubcategory extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $category, $search, $subcategory;

    protected $listeners = ['render', 'deleteSubcategory'];

    public $editForm = [
        'name' => null,
        'color' => false,
        'size' => false,
    ];

    protected $validationAttributes = [
        'editForm.name' => 'nombre',
        'editForm.color' => 'color',
        'editForm.size' => 'talla',
    ];


    public function mount(Category $category)
    {
        $this->category = $category;
    }

    public function deleteSubcategory(Subcategory $subcategory)
    {
        $subcategory->delete();
        $this->emit('render');
    }

    public function edit(Subcategory $subcategory)
    {
        $this->subcategory = $subcategory;

        $this->editForm['name'] = $subcategory->name;
        $this->editForm['color'] = $subcategory->color;
        $this->editForm['size'] = $subcategory->size;
    }

    public function editSubcategory()
    {
        $rules = [
            'editForm.name' => 'required',
            'editForm.color' => 'required',
            'editForm.size' => 'required',
        ];

        $this->validate($rules);

        $this->subcategory->update(
            [
                'name' => $this->editForm['name'],
                'slug' => Str::slug($this->editForm['name']),
                'color' => $this->editForm['color'],
                'size' => $this->editForm['size'],
            ]
        );

        $this->emit('messageUpdateSubcategory');
        $this->emit('render');
        $this->reset(['editForm']);
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $subcategories = Subcategory::where('name', 'like', '%' . $this->search . '%')->where('category_id', $this->category->id)->orderByRaw('name ASC')->paginate(10);

        return view('livewire.admin.show-edit-subcategory', compact('subcategories'))->layout('layouts.admin');
    }
}
