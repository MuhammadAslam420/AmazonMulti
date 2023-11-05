<?php

namespace App\Http\Livewire\Admin\Coupon;

use Livewire\Component;
use App\Models\SaleOn;
class AdminSaleOnComponent extends Component
{
    public $sale_date;
    public $status;

    public function mount()
    {
        $sale= SaleOn::find(1);
        $this->sale_date=$sale->sale_date;
        $this->status=$sale->status;
    }
    public function updateSale()
    {
        $sale=SaleOn::find(1);
        $sale->sale_date=$this->sale_date;
        $sale->status=$this->status;
        $sale->save();
        return redirect()->route('admin.sale')->with('message','Sale On Timer & date has been updated successfully!');
        //session()->flash('message','Recoord has been update successfully');
    }
    public function render()
    {
        return view('livewire.admin.coupon.admin-sale-on-component')->layout('layouts.admin.base');
    }
}
