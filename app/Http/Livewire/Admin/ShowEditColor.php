<?php

namespace App\Http\Livewire\Admin;

use App\Models\Color;
use Livewire\Component;
use Livewire\WithPagination;

class ShowEditColor extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $color, $search;

    protected $listeners = ['render', 'deleteColor'];

    public $editForm = [
        'name' => null,
        'hex' => null,

    ];

    protected $validationAttributes = [
        'editForm.name' => 'nombre',
        'editForm.hex' => 'exadecimal',
    ];

    public function deleteColor(Color $color)
    {
        $color->delete();
        $this->emit('render');
    }

    public function edit(Color $color)
    {
        $this->color = $color;

        $this->editForm['name'] = $color->name;
        $this->editForm['hex'] = $color->hex;
    }

    public function editColor()
    {
        $rules = [
            'editForm.name' => 'required|unique:colors,name,' . $this->color->id,
            'editForm.hex' => 'required|unique:colors,hex,' . $this->color->id,
        ];

        $this->validate($rules);

        $this->color->update(
            [
                'name' => $this->editForm['name'],
                'hex' => $this->editForm['hex'],
            ]
        );

        $this->emit('messageUpdateColors');
        $this->emit('render');
        $this->reset(['editForm']);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $colores = Color::where('name', 'like', '%' . $this->search . '%')->orderByRaw('name ASC')->paginate(10);

        return view('livewire.admin.show-edit-color', compact('colores'))->layout('layouts.admin');
    }
}
