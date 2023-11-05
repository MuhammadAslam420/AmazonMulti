<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class DealsComponent extends Component
{
    public $sorting;
    public $pagesize;
    public $min_price;
    public $max_price;
    public function mount()
    {
        $this->sorting='default';
        $this->pagesize=12;
        $this->min_price=100;
        $this->max_price=10000;
    }
    public function store($product_id,$product_name,$product_price){
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added to Cart');
        return redirect()->route('product.cart');
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
    public function removeFromCompare($product_id)
    {
         foreach(Cart::instance('compare')->content() as $citems)
         {
             if($witems->id == $product_id)
             {
              Cart::instance('compare')->remove($citems->rowId);
              $this->emitTo('comapre-count-component','refreshComponent');
              return;

             }
         }
    }

    use WithPagination;
    public function render()
    {
        if($this->sorting=='date'){
            $products=Product::where('deals','>',0)->whereBetween('deals',[$this->min_price,$this->max_price])->orderBy('created_at','DESC')->paginate($this->pagesize);
        }
        elseif
        ($this->sorting=='price'){
            $products=Product::where('deals','>',0)->whereBetween('deals',[$this->min_price,$this->max_price])->orderBy('deals','ASC')->paginate($this->pagesize);
        }
        elseif($this->sorting=='price-desc'){
            $products=Product::where('deals','>',0)->whereBetween('deals',[$this->min_price,$this->max_price])->orderBy('deals','DESC')->paginate($this->pagesize);


        }
        else{
            $products=Product::where('deals','>',0)->whereBetween('deals',[$this->min_price,$this->max_price])->paginate($this->pagesize);

        }
        $categories=Category::all();

        if(Auth::check()){
            Cart::instance('cart')->store(Auth::user()->email);
            Cart::instance('wishlist')->store(Auth::user()->email);

        }
        $newproducts=Product::orderBy('created_at','desc')->inRandomOrder()->limit(4)->get();
        //dd($newproducts);
       // $bestproducts=OrderItem::orderBy('quantity','asc')->inRandomOrder()->limit(4)->get();
               $new=Product::orderBy('id','desc')->inRandomOrder()->take(4)->get();

        return view('livewire.deals-component',['products'=>$products,'categories'=>$categories,'newproducts'=>$newproducts,'new'=>$new])->layout('layouts.base');
    }
}
