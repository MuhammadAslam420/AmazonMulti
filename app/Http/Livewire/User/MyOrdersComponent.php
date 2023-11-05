<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Order;
use Livewire\WithPaginate;
use Illuminate\Support\Facades\Auth;
class MyOrdersComponent extends Component
{
    public function render()
    {
        $orders = Order::where('user_id', Auth::user()->id)->paginate(12);
        return view('livewire.user.my-orders-component',['orders'=>$orders])->layout('layouts.base');
    }
}
