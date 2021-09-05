<?php

namespace App\Http\Livewire\Admin;

use App\Models\Color;
use Livewire\Component;
use App\Models\ColorSize as Pivot;

class ColorSize extends Component
{

    public $size, $colors, $color_id = "", $quantity;

    public $pivot, $pivot_color_id, $pivot_quantity;

    public $rules = ['color_id' => 'required', 'quantity' => 'required|numeric'];

    protected $listeners = ['delete'];

    public function mount()
    {
        $this->colors = Color::all();
    }

    public function save()
    {
        $this->validate();

        $pivot = Pivot::where('color_id', $this->color_id)
            ->where('size_id', $this->size->id)
            ->first();

        if ($pivot) {
            $pivot->quantity = $pivot->quantity + $this->quantity;
            $pivot->save();
        } else {
            $this->size->colors()->attach([
                $this->color_id => [
                    'quantity' => $this->quantity
                ]
            ]);
        }

        $this->reset(['color_id', 'quantity']);

        $this->emit('messageColorSize', '');

        $this->size = $this->size->fresh();
    }


    public function edit(Pivot $pivot)
    {
        $this->pivot = $pivot;
        $this->pivot_color_id = $pivot->color_id;
        $this->pivot_quantity = $pivot->quantity;
    }

    public function update()
    {
        $this->validate(['pivot_color_id' => 'required', 'pivot_quantity' => 'required|numeric']);

        $this->pivot->color_id = $this->pivot_color_id;
        $this->pivot->quantity = $this->pivot_quantity;

        $this->pivot->save();

        $this->emit('updateColorSize', '');

        $this->size = $this->size->fresh();
    }

    public function delete(Pivot $pivot)
    {
        $pivot->delete();

        $this->size = $this->size->fresh();
    }

    public function render()
    {
        $size_colors = $this->size->colors;

        return view('livewire.admin.color-size', compact('size_colors'));
    }
}
