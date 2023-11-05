<?php

namespace App\Http\Livewire\Vendor;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithFileUploads;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
class VendorEditProductComponent extends Component
{
    use WithfileUploads;
    public $name;
    public $slug;
    public $category_id;
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
    public $nf_image;
    public $nb_image;
    public $n_gallery;
    public $quantity;
    public $product_id;

    public function mount($id)
    {
        $this->product_id=$id;
          $product=Product::find($id);
          $this->name=$product->name;
          $this->slug=$product->slug;
          $this->category_id=$product->category_id;
          $this->short_description=$product->short_description;
          $this->description=$product->description;
          $this->SKU=$product->SKU;
          $this->stock_status=$product->stock_status;
          $this->price=$product->price;
          $this->discount=$product->discount;
          $this->deals=$product->deals;
          $this->special_offer=$product->special_offer;
          $this->front_image=$product->front_image;
          $this->back_image=$product->back_image;
          $this->gallery=$product->gallery;
          $this->quantity=$product->quantity;

    }
    public function generateslug()
    {
        $this->slug =Str::slug($this->name,'-');
    }
   
    
    public function updateProduct()
    {
        // $this->validate([
        //    'name'=>'required',
        //    'slug'=>'required',
        //    'category_id'=>'required',
        //    'description'=>'required',
        //    'SKU'=>'required',
        //    'stock_status'=>'required',
        //    'price'=>'required|numeric',
        //    'front_image'=>'required|mimes:jpeg,jpg,png',
        //    'back_image'=>'required|mimes:jpeg,jpg,png',
        //    'quantity'=>'required|numeric',
        // ]);
        $product=Product::find($this->product_id);
        $product->user_id=Auth::user()->id;
        $product->name=$this->name;
        $product->slug=$this->slug;
        $product->category_id=$this->category_id;
        $product->short_description=$this->short_description;
        $product->description=$this->description;
        $product->SKU=$this->SKU;
        $product->stock_status=$this->stock_status;
        $product->price=$this->price;
        $product->discount=$this->discount;
        $product->deals=$this->deals;
        $product->special_offer=$this->special_offer;
        $product->quantity=$this->quantity;
        if($this->nf_image)
        {
           //unlink('public/assets/images'.'/'.$product->front_image);
            $imagename=Carbon::now()->timestamp.'f'.'.'.$this->nf_image->extension();
            $this->nf_image->storeAs('assets/images',$imagename);
            $product->front_image=$imagename;
        }
        if($this->nb_image)
        {
           // unlink('public/assets/images'.'/'.$product->back_image);
            $imagename=Carbon::now()->timestamp.'.'.$this->nb_image->extension();
            $this->nb_image->storeAs('assets/images',$imagename);
            $product->back_image=$imagename;
        }
        if($this->n_gallery)
        {
        //     if($product->gallery)
        //   {
        //         $images=explode(",",$product->igallery);
        //         foreach($images as $image)
        //         {
        //             if($image)
        //             {
        //                 unlink('public/assets/images'.'/'.$image);
        //             }

        //         }

        //   }
            $imagesname='';
            foreach($this->n_gallery as $key=>$image)
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
        session()->flash('message','Prodcut Has been Edited  successfully');
        
    }
    public function render()
    {
        $categories=Category::all();
        return view('livewire.vendor.vendor-edit-product-component',['categories'=>$categories])->layout('layouts.vendor.base');
    }
}
