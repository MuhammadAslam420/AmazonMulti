<?php

namespace App\Http\Livewire\Vendor;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithFileUploads;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;


class VendorAddProductComponent extends Component
{
    use WithfileUploads;
    public $name;
    public $slug;
    public $category_id;
    public $scategory_id;
    public $short_description;
    public $description;
    public $SKU;
    public $stock_status;
    public $price;
    public $discount;
    public $deals;
    public $special_offer;
    public $front_image;
    public $back_image;
    public $gallery;
    public $quantity;

    public function mount()
    {

    }
    public function generateslug()
    {
        $this->slug =Str::slug($this->name,'-');
    }


    public function addProduct()
    {
        $this->validate([
           'name'=>'required',
           'slug'=>'required',
           'category_id'=>'required',
           'description'=>'required',
           'SKU'=>'required',
           'stock_status'=>'required',
           'price'=>'required|numeric',
           'front_image'=>'required|mimes:jpeg,jpg,png',
           'back_image'=>'required|mimes:jpeg,jpg,png',
           'quantity'=>'required|numeric',
        ]);
        $product=new Product();
        $product->user_id=Auth::user()->id;
        $product->category_id=$this->category_id;
        $product->sub_category_id = $this->scategory_id;
        $product->name=$this->name;
        $product->slug=$this->slug;
        $product->short_description=$this->short_description;
        $product->description=$this->description;
        $product->SKU=$this->SKU;
        $product->stock_status=$this->stock_status;
        $product->price=$this->price;
        $product->discount=$this->discount;
        $product->quantity=$this->quantity;
        if($this->front_image)
        {
            $imagename=Carbon::now()->timestamp.'.'.$this->front_image->extension();
            $this->front_image->storeAs('assets/images',$imagename);
            $product->front_image=$imagename;
        }
        if($this->back_image)
        {
            $imagename=Carbon::now()->timestamp.'.'.$this->back_image->extension();
            $this->back_image->storeAs('assets/images',$imagename);
            $product->back_image=$imagename;
        }
        if($this->gallery)
        {
            $imagesname='';
            foreach($this->gallery as $key=>$image)
            {
                $imgName =Carbon::now()->timestamp.$key.'.'.$image->extension();
                $image->storeAs('assets/images/gallery',$imgName);
                $imagesname =$imagesname .','.$imgName;

            }
            $product->gallery=$imagesname;
        }
        $product->deals=$this->deals;
        $product->special_offer=$this->special_offer;
        $product->save();
        session()->flash('message','New Prodcut Has been added successfully');

    }
    public function render()
    {
        $categories=Category::all();
        $scategories=SubCategory::all();
        return view('livewire.vendor.vendor-add-product-component',['scategories'=> $scategories,'categories'=>$categories])->layout('layouts.vendor.base');
    }
}
