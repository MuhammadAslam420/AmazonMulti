<?php

namespace App\Http\Livewire;

use Livewire\Component;
 use App\Models\OrderItem;
 use App\Models\HomePageSetting;
 use App\Models\Category;
 use Illuminate\Support\Facades\DB;
 use App\Models\Product;
 use App\Models\SaleOn;
class FooterComponent extends Component
{
    public function render()
    {
        $bestproducts=OrderItem::orderBy('quantity','asc')->inRandomOrder()->limit(4)->get();
        $setting=HomePageSetting::find(1);
        $categories=Category::inRandomOrder()->limit(6)->get();
        $trendings = DB::table('products')
            ->leftJoin('order_items','products.id','=','order_items.product_id')
            ->selectRaw('products.*, COALESCE(sum(order_items.quantity),0) total')
            ->groupBy('products.id')
            ->orderBy('total','desc')
            ->inRandomOrder()
            ->take(4)
            ->get();
            $recents=Product::orderBy('id','desc')->inRandomOrder()->limit(4)->get();


        return view('livewire.footer-component',['bestproducts'=>$bestproducts,'setting'=>$setting,'categories'=>$categories,
        'trendings'=>$trendings,'recents'=>$recents]);
    }
}
