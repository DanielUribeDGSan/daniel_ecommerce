<?php

namespace App\Http\Livewire\Admin;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Illuminate\Support\Str;

class EditProduct extends Component
{
    public $producto;

    public $categories, $subcategories = [], $brands = [];
    public $category_id = "", $subcategory_id = "", $brand_id = "";
    public $name, $description, $price, $quantity;


    protected $rules = [
        'category_id' => 'required',
        'subcategory_id' => 'required',
        'name' => 'required',
        'brand_id' => 'required',
        'price' => 'required',
    ];

    // public function updatedCategoryId($value)
    // {
    //     $this->subcategories = Subcategory::where('category_id', $value)->get();
    //     $this->brands = Brand::whereHas('categories', function (Builder $query) use ($value) {
    //         $query->where('category_id', $value);
    //     })->get();
    //     $this->reset(['subcategory_id', 'brand_id']);
    // }

    // public function updatedSubcategoryId($value)
    // {
    //     $this->subcategory = Subcategory::find($value);
    // }
    // public function getSubcategoryProperty()
    // {
    //     return Subcategory::find($this->subcategory_id);
    // }

    public function save()
    {
        $rules = $this->rules;

        if ($this->subcategory_id) {
            if (!$this->subcategory->color && !$this->subcategory->size) {
                $rules['quantity'] = 'required';
            }
        }

        $this->validate($rules);

        $product = new Product();

        $product->name = $this->name;
        $product->slug = Str::slug($this->name);
        $product->description = $this->description;
        $product->price = $this->price;
        $product->subcategory_id = $this->subcategory_id;
        $product->brand_id = $this->brand_id;
        if ($this->subcategory_id) {
            if (!$this->subcategory->color && !$this->subcategory->size) {
                $product->quantity = $this->quantity;
            }
        }

        $product->save();
        session(['productoCreado' => 'Producto creado']);

        $this->emit('message', 'Producto creado');
        $this->reset(['category_id', 'subcategory_id', 'brand_id', 'name', 'description', 'price', 'quantity', 'description']);
        redirect()->route('admin.productos');
    }

    public function getSubcategoryProperty()
    {
        return Subcategory::find($this->producto->subcategory_id);
    }


    public function mount()
    {
        $this->categories = Category::all();
        $this->category_id = $this->producto->subcategory->category->id;
        $this->subcategories = Subcategory::where('category_id', $this->category_id)->get();
        $this->brands = Brand::whereHas(
            'categories',
            function (Builder $query) {
                $query->where('category_id', $this->category_id);
            }
        )->get();
    }

    public function render()
    {
        return view('livewire.admin.edit-product');
    }
}
