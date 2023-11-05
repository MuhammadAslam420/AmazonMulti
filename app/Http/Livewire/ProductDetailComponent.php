<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\SaleOn;
use Cart;
class ProductDetailComponent extends Component
{
    public $product_id;
    public function mount($id)
    {
        $this->product_id=$id;
    }
    protected $listeners = ['refreshComponent'=>'$refresh'];
    // public function increaseQuantity($product_id){
    //     $product =Cart::instance('cart')->get($product_id);
    //     $qty =$product->qty + 1;
    //     Cart::instance('cart')->update($product_id,$qty);
    //     $this->emitTo('cart-count-component','refreshComponent');


    // }
    // public function decreaseQuantity($product_id){
    //     $product =Cart::instance('cart')->get($product_id);
    //     $qty =$product->qty - 1;
    //     Cart::instance('cart')->update($product_id,$qty);
    //     $this->emitTo('cart-count-component','refreshComponent');


    // }
    public function store($product_id,$product_name,$product_price){
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component','refreshComponent');
    }
    public function addToWishlist($product_id,$product_name,$product_price)
    {
        Cart::instance('wishlist')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        $this->emitTo('wish-list-count-component','refreshComponent');
    }

    public function addToCompare($product_id,$product_name,$product_price)
    {
        Cart::instance('compare')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        $this->emitTo('compare-count-component','refreshComponent');
    }


    public function render()
    {
        $product=Product::find($this->product_id);
        $relateds=Product::where('category_id',$product->category_id)->inrandomOrder()->limit(4)->get();
        $sale=SaleOn::find(1);
        return view('livewire.product-detail-component',['product'=>$product,'relateds'=>$relateds,'sale'=>$sale])->layout('layouts.base');
    }
}
