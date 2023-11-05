<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use App\Models\Product;
use Cart;
use App\Models\SaleOn;


class CategoryComponent extends Component
{
    use WithPagination;
    public $sorting;
    public $pagesize;
    public $min_price;
    public $max_price;
    public $category_id;
    public function mount($id){
        $this->sorting='default';
        $this->pagesize=12;
        $this->min_price=100;
        $this->max_price=10000;
        $this->category_id=$id;
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
        $category=Category::find($this->category_id);
        $category_id=$category->id;
        $category_name=$category->name;
        if($this->sorting=='date'){
            $products=Product::where('category_id',$this->category_id)->whereBetween('price',[$this->min_price,$this->max_price])->orderBy('created_at','DESC')->paginate($this->pagesize);


        }
        elseif($this->sorting=='price'){
            $products=Product::where('category_id',$this->category_id)->whereBetween('price',[$this->min_price,$this->max_price])->orderBy('price','ASC')->paginate($this->pagesize);


        }
        elseif($this->sorting=='price-desc'){
            $products=Product::where('category_id',$this->category_id)->whereBetween('price',[$this->min_price,$this->max_price])->orderBy('price','DESC')->paginate($this->pagesize);


        }
        else{
            $products=Product::where('category_id',$this->category_id)->whereBetween('price',[$this->min_price,$this->max_price])->paginate($this->pagesize);

        }
        $categories=Category::all();
        $sale=SaleOn::find(1);
        $deals=Product::where('deals','>',0)->inRandomOrder()->take(4)->get();
        $new=Product::orderBy('id','desc')->inRandomOrder()->take(4)->get();
        return view('livewire.category-component',['categories'=>$categories,'products'=>$products,'category_name'=>$category_name,'sale'=>$sale,'deals'=>$deals,'new'=>$new])->layout('layouts.base');
    }
}
