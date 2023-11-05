<?php

namespace App\Http\Livewire\Vendor;

use Livewire\Component;
use App\Models\OrderItem;
use App\Models\Order;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Wallet;

class VendorOrderComponent extends Component
{
    use WithPagination;
    public $sortBy='desc';
    public $perPage=5;
    public function changeStatus($id,$status)
    {
        $order=Order::find($id);
        $order->status=$status;
        if($status === 'delivered')
        {
            $order->delivered_date=Carbon::today();
        }
        elseif($status === 'canceled')
        {
            $order->canceled_date=Carbon::today();
        }
        $order->save();
        session()->flash('message','Successfully Update status');
    }
    public function changePaymentStatus($id,$product,$status)
    {
    //    $order=Order::find($id);
       $wallet=new Wallet();
       $wallet->vendor_id=Auth::user()->id;
       $wallet->order_id=$id;
       $wallet->product_id=$product;
       $wallet->payment=$status;
       $wallet->save();
       session()->flash('message','Wallet Has Been Updated');


    }
    public function render()
    {
        $items=OrderItem::where('vendor_id',Auth::user()->id)->orderBY('id',$this->sortBy)->paginate($this->perPage);
        return view('livewire.vendor.vendor-order-component',['items'=>$items])->layout('layouts.vendor.base');
    }
}
