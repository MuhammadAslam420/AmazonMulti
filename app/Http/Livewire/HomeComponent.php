<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use App\Models\HomeCategory;
use Cart;
use App\Models\SaleOn;
use App\Models\Banner;
class HomeComponent extends Component
{
    protected $listeners = ['refreshComponent'=>'$refresh'];
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

    public function render()
    {
        $products=Product::where('status',1)->where('stock_status','InStock')->inRandomOrder()->limit(15)->get();
        $categories=Category::inRandomOrder()->limit(12)->get();
        $f_categories=Category::limit(4)->get();
        $category = HomeCategory::find(1);
        //dd($category);
        $cats =explode(',', $category->sel_categories);
        $hcategories=Category::whereIn('id',$cats)->get();
        //dd($hcategories);
        $no_of_products =$category->no_of_products;
        $featureds=Product::where('status',1)->where('featured',1)->inRandomOrder()->limit(5)->get();
        $specials=Product::where('status',1)->where('special_offer','>',0)->inRandomOrder()->limit(5)->get();
        $news=Product::where('status',1)->orderBy('id','desc')->inRandomOrder()->limit(5)->get();
        $sale=SaleOn::find(1);
        $sproducts=Product::where('status',1)->where('discount','>',0)->inRandomOrder()->take(4)->get();
        $sliders=Banner::where('status',1)->where('position',2)->get();
        return view('livewire.home-component',['products'=>$products,'categories'=>$categories,'f_categories'=>$f_categories,
        'hcategories'=>$hcategories,'no_of_products'=>$no_of_products,'featureds'=>$featureds,'specials'=>$specials,'news'=>$news,'sale'=>$sale,'sproducts'=>$sproducts,'sliders'=>$sliders])->layout('layouts.base');
    }
}
