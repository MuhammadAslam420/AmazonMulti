<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use  Illuminate\Support\Facades\DB;
class AdminOrderDetailComponent extends Component
{
    public $order_id;
    public function mount($id)
    {
        $this->order_id=$id;
    }
   
    public function cancelOrder($id)
    {
        $order = Order::find($id);
        $order->status = "cancel";
        $order->canceled_date = DB::raw('CURRENT_DATE');
        $order->save();
        return redirect()->route('admin.view_all_orders')->with('message', 'Order has been Canceled');
    }
    public function render()
    {
        $order=Order::find($this->order_id);
        return view('livewire.admin.admin-order-detail-component',['order'=>$order])->layout('layouts.admin.base');
    }
}
