<?php

namespace App\Http\Livewire\Admin;

use App\Models\Color;
use Livewire\Component;

class AddColor extends Component
{

    public $color;

    public $createForm = [
        'name' => null,
        'hex' => null,
    ];

    protected $rules = [
        'createForm.name' => 'required|unique:colors,name',
        'createForm.hex' => 'required|unique:colors,hex',
    ];

    protected $validationAttributes = [
        'createForm.name' => 'nombre',
        'createForm.hex' => 'exadecimal',
    ];


    public function saveColor()
    {
        $this->validate();

        Color::create(
            [
                'name' => $this->createForm['name'],
                'hex' => $this->createForm['hex'],
            ]
        );
        $this->reset('createForm');
        $this->emit('newColor');
        $this->emit('render');
    }

    public function render()
    {
        return view('livewire.admin.add-color');
    }
}
