<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;


class ContentFilter extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $category, $subcategoria, $marca;
    public $options = [];
    public $colorArr = [];
    public $size = [];
    public $colorSize = [];
    public $quantity = 0;
    public $qty = 1;
    public $product_clean = 0;
    public $loading = 0;


    public function limpiar()
    {
        $this->reset(['subcategoria', 'marca']);
    }

    public function loadData()
    {
        $this->loading = 1;
    }

    public function addItem($id)
    {
        $product = Product::where('id', $id)->first();
        $this->colorArr = $product->colors->first();
        $this->size = $product->sizes->first();

        if (isset($this->size)) {

            $this->colorSize = $this->size->colors->find($this->size->id);
            $this->options['size'] = $this->size->name;
            $this->options['size_id'] = $this->size->id;
            $this->options['color'] = $this->colorSize->name;
            $this->options['color_id'] = $this->colorSize->id;
            $this->quantity = qty_available($product->id, $this->colorSize->id, $this->size->id);
        } else if (isset($this->colorArr->name)) {
            $this->options = [
                'size_id' => null
            ];
            $this->options['color'] = $this->colorArr->name;
            $this->options['color_id'] = $this->colorArr->id;
            $this->quantity = qty_available($product->id, $this->colorArr->id);
        } else if (!isset($this->colorArr->name) && !isset($this->size)) {
            $this->options = [
                'color_id' => null,
                'size_id' => null
            ];
            $this->quantity = qty_available($product->id);
        }


        $this->options['image'] = asset('assets/images/' . $product->images->first()->url);
        if ($this->qty > $this->quantity) {
            $this->emit('render');
            $this->product_clean = 1;
        } else {
            FacadesCart::add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => $this->qty,
                'price' => $product->price,
                'weight' => 550,
                'options' => $this->options
            ]);
            $this->emit('render');
        }
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
