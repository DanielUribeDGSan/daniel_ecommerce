<?php

namespace App\Http\Livewire\Admin;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Illuminate\Support\Str;
use File;

class EditProduct extends Component
{
    public $product, $categories, $subcategories, $brands;
    public $description;
    public $category_id;

    protected $rules = [
        'category_id' => 'required',
        'product.subcategory_id' => 'required',
        'product.name' => 'required|unique:products',
        'product.brand_id' => 'required',
        'product.price' => 'required',
        'product.quantity' => 'numeric',
    ];

    protected $listeners = ['refreshImage', 'delete'];

    public function mount(Product $product)
    {
        $this->description = $product->description;

        $this->product = $product;

        $this->categories = Category::all();

        $this->category_id = $product->subcategory->category->id;

        $this->subcategories = Subcategory::where('category_id', $this->category_id)->get();

        $this->slug = $this->product->slug;

        $this->brands = Brand::whereHas('categories', function (Builder $query) {
            $query->where('category_id', $this->category_id);
        })->get();
    }


    public function updatedCategoryId($value)
    {
        $this->subcategories = Subcategory::where('category_id', $value)->get();
        $this->brands = Brand::whereHas('categories', function (Builder $query) use ($value) {
            $query->where('category_id', $value);
        })->get();
        $this->product->subcategory_id = "";
        $this->product->brand_id = "";
    }

    // public function updatedSubcategoryId($value)
    // {
    //     $this->subcategory = Subcategory::find($value);
    // }

    public function save()
    {
        $rules = $this->rules;

        $rules['product.name'] = 'required|unique:products,name,' . $this->product->id;

        if ($this->product->subcategory_id) {
            if (!$this->subcategory->color && !$this->subcategory->size) {
                $rules['product.quantity'] = 'required|numeric';
            }
        }

        $this->validate($rules);


        $this->product->description = $this->description;
        $this->product->slug = Str::slug($this->product->name);

        $this->product->save();
        $this->emit('messageUpdate', 'Producto actualizado');
        $this->emit('render');
    }

    public function getSubcategoryProperty()
    {
        return Subcategory::find($this->product->subcategory_id);
    }

    public function deleteImage(Image $image)
    {
        $ruta = public_path('assets/images/');
        File::delete($ruta . $image->url);
        $image->delete();
        $this->product = $this->product->fresh();
    }

    public function refreshImage()
    {
        $this->product = $this->product->fresh();
    }

    public function delete()
    {
        $images = $this->product->images;
        $ruta = public_path('assets/images/');

        foreach ($images as $image) {
            File::delete($ruta . $image->url);
            $image->delete();
        }
        $this->product->delete();
        return redirect()->route('admin.productos');
    }

    public function render()
    {
        return view('livewire.admin.edit-product')->layout('layouts.admin');
    }
}
