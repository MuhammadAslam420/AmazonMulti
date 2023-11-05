<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
class WishListComponent extends Component
{
    protected $listeners = ['refreshComponent'=>'$refresh'];
    public function removeFromWishlist($product_id)
    {
         foreach(Cart::instance('wishlist')->content() as $witems)
         {
             if($witems->id == $product_id)
             {
              Cart::instance('wishlist')->remove($witems->rowId);
              $this->emitTo('wish-list-count-component','refreshComponent');
             }
         }
       
    }
    public function moveProductFromWishlistToCart($rowId)
    {
        $item = Cart::instance('wishlist')->get($rowId);
        Cart::instance('wishlist')->remove($rowId);
        Cart::instance('cart')->add($item->id,$item->name,1,$item->price)->associate('App\Models\Product');
        $this->emitTo('wish-list-count-component','refershComponent');
        $this->emitTo('cart-count-component','refershComponent');


    }

    public function render()
    {
        return view('livewire.wish-list-component')->layout('layouts.base');
    }
}
