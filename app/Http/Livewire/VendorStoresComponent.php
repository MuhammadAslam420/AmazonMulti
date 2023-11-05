<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Product;
use Livewire\WithPagination;
use App\Models\SaleOn;
use App\Models\Category;

class VendorStoresComponent extends Component
{
    use WithPagination;
    public $user_id;
    public $pagesize=10;
    public $sorting='desc';
    public $search;
    public function mount($id)
    {
        $this->user_id=$id;
    }
    public function store($product_id,$product_name,$product_price){
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component','refreshComponent');
    }
    public function addToWishlist($product_id,$product_name,$product_price)
    {
        Cart::instance('wishlist')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        $this->emitTo('wish-list-count-component','refreshComponent');
    }
    public function removeFromWishlist($product_id)
    {
         foreach(Cart::instance('wishlist')->content() as $witems)
         {
             if($witems->id == $product_id)
             {
              Cart::instance('wishlist')->remove($witems->rowId);
              $this->emitTo('wish-list-count-component','refreshComponent');
              return;

             }
         }
    }
    public function addToCompare($product_id,$product_name,$product_price)
    {
        Cart::instance('compare')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        $this->emitTo('compare-count-component','refreshComponent');
    }
    public function render()
    {
        $products=Product::where('user_id',$this->user_id)->orderBy('created_at',$this->sorting)->paginate($this->pagesize);
        //dd($user);
        $user=User::find($this->user_id);
        $deals=Product::where('deals','>',0)->inRandomOrder()->limit(4)->get();
        $sale=SaleOn::find(1);
        $categories=Category::all();
        return view('livewire.vendor-stores-component',['products'=>$products,'user'=>$user,'deals'=>$deals,'sale'=>$sale,'categories'=>$categories])->layout('layouts.base');
    }
}
