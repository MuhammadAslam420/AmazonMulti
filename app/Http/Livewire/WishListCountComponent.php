<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
class WishListCountComponent extends Component
{
    protected $listeners = ['refreshComponent'=>'$refresh'];
    public function destroy($rowId)
    {
        Cart::instance('wishlist')->remove($rowId);
        $this->emitTo('wishlist-count-component', 'refreshComponent');

    }

    public function render()
    {
        return view('livewire.wish-list-count-component');
    }
}
