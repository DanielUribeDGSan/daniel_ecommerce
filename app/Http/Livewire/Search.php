<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;
use Livewire\Component;
use Livewire\WithPagination;


class Search extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $queryString = ['search'];

    public $search, $busqueda;
    public $options = [];
    public $colorArr = [];
    public $size = [];
    public $colorSize = [];
    public $quantity = 0;
    public $qty = 1;
    public $product_clean = 0;
    public $loading = 0;

    public function mount()
    {
        $this->search = $this->busqueda;
    }

    public function updatingSearch()
    {
        $this->resetPage();
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

    public function render()
    {
        $products = Product::where('name', 'LIKE', "%" . $this->search . "%")->where('status', 2)->paginate(8);
        return view('livewire.search', compact('products'));
    }
}
