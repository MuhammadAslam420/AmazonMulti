<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use Livewire\WithPagination;

class AdminViewOrderComponent extends Component
{
    use WithPagination;
    public function deleteOrder($id)
    {
        $order=Order::find($id);
        $order->delete();
        return redirect()->route('admin.view_all_orders')->with('message','order has been deleted!');
        
    }
    public function render()
    {
        $orders=Order::paginate(12);
        return view('livewire.admin.admin-view-order-component',['orders'=>$orders])->layout('layouts.admin.base');
    }
}
