<?php

namespace App\Http\Livewire\Vendor;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
class VendorProductComponent extends Component
{
    use withPagination;
    public $sortBy='desc';
    public $perPage=5;
    public $search;
    public function deleteProduct($id)
    {
        $product = Product::find($id);
        // if($product->front_image)
        // {
        //     unlink('assets/images'.'/'.$product->front_image);
        // }
        // if($product->back_image)
        // {
        //     unlink('assets/images'.'/'.$product->back_image);
        // }
        // if($product->gallery)
        // {
        //     $gallery=explode(",", $product->gallery);
        //     foreach($gallery as $image)
        //     {
        //       if($image)
        //       {
        //         unlink('assets/images/gallery'.'/'.$image);

        //       }
        //     }
        // }
        $product->delete();
        session()->flash('message','Product has been deleted by you successfully!');
    }

    public function render()
    {
        $products=Product::where('user_id',Auth::user()->id)->orderBy('id',$this->sortBy)->paginate($this->perPage);
        return view('livewire.vendor.vendor-product-component',['products'=>$products])->layout('layouts.vendor.base');
    }
}
