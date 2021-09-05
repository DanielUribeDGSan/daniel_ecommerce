<?php

namespace App\Http\Livewire\Admin;

use App\Models\Color;
use App\Models\Size;
use Livewire\Component;

class SizeProduct extends Component
{

    public $product, $talla, $colors;
    public $size, $tallaUpdate;

    public $rules = ['talla' => 'required'];

    protected $listeners = ['delete'];


    public function mount()
    {
        $this->colors = Color::all();
    }

    public function save()
    {
        $this->validate();
        $this->product->sizes()->create([
            'name' => $this->talla
        ]);

        $this->product = $this->product->fresh();
        $this->reset(['talla']);

        $this->emit('messageSise', '');
    }

    public function edit(Size $size)
    {
        $this->tallaUpdate = $size->name;
        $this->size = $size;
    }

    public function update()
    {
        $this->validate(['tallaUpdate' => 'required']);

        $this->size->name = $this->tallaUpdate;

        $this->size->save();
        $this->product = $this->product->fresh();

        $this->emit('SizeUpdate', '');
    }

    public function delete(Size $size)
    {
        $size->delete();
        $this->product = $this->product->fresh();
    }

    public function render()
    {
        $sizes = $this->product->sizes;
        return view('livewire.admin.size-product', compact('sizes'));
    }
}
