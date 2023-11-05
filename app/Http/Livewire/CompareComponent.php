<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class CompareComponent extends Component
{
    public function store($product_id,$product_name,$product_price){
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component','refreshComponent');
    }
    public function destroy($rowId){
        Cart::instance('compare')->remove($rowId);
        $this->emitTo('compare-count-component','refreshComponent');

        session()->flash('warning_msg','Product has been removed from compare list successfully');


    }
    public function render()
    {
        return view('livewire.compare-component')->layout('layouts.base');
    }
}
