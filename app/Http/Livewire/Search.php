<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;
use Livewire\Component;

class Search extends Component
{
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
            $this->options['color'] = $this->colorSize->name;
            $this->quantity = qty_available($product->id, $this->colorSize->id, $this->size->id);
        } else if (isset($this->colorArr->name)) {
            $this->options = [
                'size_id' => null
            ];
            $this->options['color'] = $this->colorArr->name;
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
            $this->emitTo('menu-cart', 'render');
            $this->emitTo('icon-cart', 'render');
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
            $this->emitTo('menu-cart', 'render');
            $this->emitTo('icon-cart', 'render');
        }
    }

    public function render()
    {
        $products = Product::where('name', 'LIKE', "%" . $this->search . "%")->where('status', 2)->paginate(8);
        return view('livewire.search', compact('products'));
    }
}
