<?php

namespace App\Http\Livewire\Admin\Coupon;

use Livewire\Component;
use App\Models\Coupon;
class AdminEditCouponComponent extends Component
{
    public $code;
    public $type;
    public $value;
    public $cart_value;
    public $coupon_id;
    public $expirey_date;
    public $couponId;

    public function mount($id)
    {
        $this->couponId=$id;
        $coupon = Coupon::find($id);
        $this->code = $coupon->code;
        $this->type = $coupon->type;
        $this->value = $coupon->value;
        $this->cart_value = $coupon->cart_value;
        $this->expirey_date = $coupon->expirey_date;
        $this->coupon_id = $coupon->coupon_id;
    }

    public function updateCoupon()
    {
        $this->validate([
            'code' => 'required',
            'type' => 'required',
            'value' => 'required',
            'cart_value' => 'required',
            'expirey_date' => 'required'
        ]);
        $coupon = Coupon::find($this->couponId);
        $coupon->code = $this->code;
        $coupon->type = $this->type;
        $coupon->value = $this->value;
        $coupon->cart_value = $this->cart_value;
        $coupon->expirey_date = $this->expirey_date;
        $coupon->save();
        return redirect()->route('admin.coupons')->with('message','Coupon has been edit successfully!');
        //session()->flash('message', 'Coupon has been Updated');
    }
    public function render()
    {
        return view('livewire.admin.coupon.admin-edit-coupon-component')->layout('layouts.admin.base');
    }
}
