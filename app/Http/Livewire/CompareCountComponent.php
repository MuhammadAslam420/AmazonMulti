<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
class CompareCountComponent extends Component
{
    protected $listeners = ['refreshComponent'=>'$refresh'];
    public function destroy($rowId)
    {
        Cart::instance('compare')->remove($rowId);
        $this->emitTo('compare-count-component', 'refreshComponent');

    }
    public function render()
    {
        return view('livewire.compare-count-component');
    }
}
