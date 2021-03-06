<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ColorSize as Pivot;

class ContentFilter extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $queryString = ['subcategoria', 'marca', 'price_max', 'price_min'];

    public $category, $subcategoria, $marca;
    public $options = [];
    public $colorArr = [];
    public $size = [];
    public $colorSize = [];
    public $quantity = 0;
    public $qty = 1;
    public $product_clean = 0;
    public $loading = 0;


    public $price_max = 10000;
    public $price_min = 10;



    public function limpiar()
    {
        $this->reset(['subcategoria', 'marca', 'page']);
        $this->price_max = 1000;
        $this->price_min = 10;
        $this->emit('limpiarPrecio');
        $this->emit('limpiarPrecio2');
    }

    public function modalProduct($productId)
    {
        $this->emitTo('modal-product', 'showModalProduct', $productId);
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
            $this->options['size'] = $this->size->name;
            $this->options['size_id'] = $this->size->id;
            $this->options['color'] = $this->size->colors->first()->name;
            $this->options['color_id'] = $this->size->colors->first()->id;
            $this->quantity = qty_available($product->id, $this->size->colors->first()->id, $this->size->id);
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

    public function updatedSubcategoria()
    {
        $this->resetPage();
    }

    public function updatedMarca()
    {
        $this->resetPage();
    }

    public function updatedPriceMax()
    {
        $this->resetPage();
    }

    public function updatedPriceMin()
    {
        $this->resetPage();
    }

    public function render()
    {

        $productsQuery = Product::query()->whereHas('subcategory.category', function (Builder $query) {
            $query->where('id', $this->category->id);
        });

        if ($this->subcategoria) {

            $productsQuery = $productsQuery->whereHas('subcategory', function (Builder $query) {
                $query->where('slug', $this->subcategoria);
            });
        }

        if ($this->marca) {
            $productsQuery = $productsQuery->whereHas('brand', function (Builder $query) {
                $query->where('name', $this->marca);
            });
        }

        if ($this->price_max || $this->price_min) {
            $productsQuery =  $productsQuery->where('price', ">=", $this->price_min)
                ->where('price', "<=", $this->price_max);
        }

        $products = $productsQuery->where('status', 2)->paginate(12);

        return view('livewire.content-filter', compact('products'));
    }
}
