<?php

namespace App\Http\Livewire\Admin\Coupon;

use Livewire\Component;
use App\Models\Coupon;
use Livewire\WithPagination;

class AdminCouponComponent extends Component
{
    use WithPagination;
    public function deleteCoupon($coupon_id)
    {
        $coupon = Coupon::find($coupon_id);
        $coupon->delete();
        return redirect()->route('admin.coupons')->with('message','Coupon has been deleted successfully!');
        //session()->flash('message', 'Coupon Has been Deleted!');
    }
    public function render()
    {
        $coupons=Coupon::paginate(12);
        return view('livewire.admin.coupon.admin-coupon-component',['coupons'=> $coupons])->layout('layouts.admin.base');
    }
}
