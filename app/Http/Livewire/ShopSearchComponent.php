<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Request;
use App\Models\SaleOn;
use Cart;
class ShopSearchComponent extends Component
{

    public $sorting;
    public $pagesize;
    public $min_price;
    public $max_price;
    public $search;
    public $product_cat_id;
    public $product_cat;
    public function mount(){
        $this->sorting='default';
        $this->pagesize=12;
        $this->min_price=100;
        $this->max_price=10000;
        $this->fill(request()->only('search','product_cat','product_cat_id'));
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
            $products=Product::whereBetween('price',[$this->min_price,$this->max_price])->where('name','like','%'.$this->search.'%')->where('category_id','like','%'.$this->product_cat_id.'%')->orderBy('created_at','DESC')->paginate($this->pagesize);


        }
        elseif($this->sorting=='price'){
            $products=Product::whereBetween('price',[$this->min_price,$this->max_price])->where('name','like','%'.$this->search.'%')->where('category_id','like','%'.$this->product_cat_id.'%')->orderBy('regular_price','ASC')->paginate($this->pagesize);


        }
        elseif($this->sorting=='price-desc'){
            $products=Product::whereBetween('price',[$this->min_price,$this->max_price])->where('name','like','%'.$this->search.'%')->where('category_id','like','%'.$this->product_cat_id.'%')->orderBy('regular_price','DESC')->paginate($this->pagesize);


        }
        else{
            $products=Product::whereBetween('price',[$this->min_price,$this->max_price])->where('name','like','%'.$this->search.'%')->where('category_id','like','%'.$this->product_cat_id.'%')->paginate($this->pagesize);

        }
        $categories=Category::all();
        $sale=SaleOn::find(1);
        $deals=Product::where('deals','>',0)->inRandomOrder()->take(4)->get();
        $new=Product::orderBy('id','desc')->inRandomOrder()->take(4)->get();
        return view('livewire.shop-search-component',['categories'=>$categories,
        'sale'=>$sale,'deals'=>$deals,'new'=>$new,'products'=>$products])->layout('layouts.base');
    }
}
