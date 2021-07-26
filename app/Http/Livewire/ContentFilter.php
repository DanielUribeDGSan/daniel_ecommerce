<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class ContentFilter extends Component
{
    public $category, $subcategoria, $marca;

    public $loading = 0;


    public function limpiar()
    {
        $this->reset(['subcategoria', 'marca']);
    }

    public function loadData()
    {
        $this->loading = 1;
    }


    public function render()
    {
        $productsQuery = Product::query()->whereHas('subcategory.category', function (Builder $query) {
            $query->where('id', $this->category->id);
        });

        if ($this->subcategoria) {
            $productsQuery = $productsQuery->whereHas('subcategory', function (Builder $query) {
                $query->where('name', $this->subcategoria);
            });
        }

        if ($this->marca) {
            $productsQuery = $productsQuery->whereHas('brand', function (Builder $query) {
                $query->where('name', $this->marca);
            });
        }

        $products = $productsQuery->paginate(12);
        return view('livewire.content-filter', compact('products'));
    }
}
