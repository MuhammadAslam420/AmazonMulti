<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Order;


class TrackOrderComponent extends Component
{
    public $order_id;

    public $email;

    public function render()
    {
        $order=Order::where('id',$this->order_id)->where('email',$this->email)->first();
        return view('livewire.user.track-order-component',['order'=>$order])->layout('layouts.base');
    }
}
