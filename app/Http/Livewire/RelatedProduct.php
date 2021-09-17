<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;

class RelatedProduct extends Component
{
    public $category, $product;
    public $products = [];
    public $options = [];
    public $colorArr = [];
    public $size = [];
    public $colorSize = [];
    public $quantity = 0;
    public $qty = 1;
    public $product_clean = 0;

    public function loadData()
    {
        $this->products = $this->category->products()->where('status', 2)->where('subcategory_id', '!=', $this->product->subcategory_id)->limit(6)->get();
        $this->emit('swiper2');
    }

    public function modalProduct($productId)
    {
        $this->emitTo('modal-product', 'showModalProduct', $productId);
        $this->emit('swiper2');
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
            $this->emit('swiper2');
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
            $this->emit('swiper2');
        }
    }

    public function render()
    {
        return view('livewire.related-product');
    }
}
