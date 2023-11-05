<?php

namespace App\Http\Livewire\Admin\Coupon;

use Livewire\Component;
use App\Models\Coupon;
class AdminAddCouponComponent extends Component
{
     public $code;
    public $type;
    public $value;
    public $cart_value;
    public $expirey_date;

    public function updated($field)
    {
        $this->validateOnly($field,[
            'code'=>'required|unique:coupons',
            'type'=>'required',
            'value'=>'required|numeric',
            'cart_value'=>'required|numeric',
            'expirey_date'=>'required'
        ]);
    }
    public function storeCoupon()
    {
        $this->validate([
            'code'=>'required|unique:coupons',
            'type'=>'required',
            'value'=>'required|numeric',
            'cart_value'=>'required|numeric',
            'expirey_date'=>'required'
        ]);
        $coupon= new Coupon();
        $coupon->code=$this->code;
        $coupon->type=$this->type;
        $coupon->value=$this->value;
        $coupon->cart_value=$this->cart_value;
        $coupon->expirey_date=$this->expirey_date;
        $coupon->save();
        return redirect()->route('admin.add-coupon')->with('message','Coupon has been created successfully!');
        //session()->flash('message','Coupon has been added');
    }
    public function render()
    {
        return view('livewire.admin.coupon.admin-add-coupon-component')->layout('layouts.admin.base');
    }
}
