<?php

namespace App\Http\Livewire\Vendor;

use Livewire\Component;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
class VendorDetailOrderComponent extends Component
{
    public $order_id;
    public function mount($id)
    {
        $this->order_id=$id;
    }
    public function render()
    {
        $items=OrderItem::where('order_id',$this->order_id)->where('vendor_id',Auth::user()->id)->get();
        return view('livewire.vendor.vendor-detail-order-component',['items'=>$items])->layout('layouts.vendor.base');
    }
}
