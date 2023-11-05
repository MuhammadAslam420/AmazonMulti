<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use Livewire\WithPagination;

class AdminViewPendingOrderComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $orders=Order::where('status','ordered')->paginate(12);
        return view('livewire.admin.admin-view-pending-order-component',['orders'=>$orders])->layout('layouts.admin.base');
    }
}
