<?php

namespace App\Http\Livewire\Vendor;

use Livewire\Component;
use App\Models\OrderItem;
use App\Models\Wallet;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class VendorDashboardComponent extends Component
{
    //public $range='';
    use WithPagination;
    public function render()
    {
        $date=Carbon::today()->subDays(7);
        $last_month_sale=OrderItem::where('vendor_id',Auth::user()->id)->where('created_at',$date)->sum('price');
        $sales=OrderItem::where('vendor_id',Auth::user()->id)->sum('price');
        $products=Product::where('user_id',Auth::user()->id)->get();
        $orders=OrderItem::where('vendor_id',Auth::user()->id)->count();
        $items=OrderItem::where('vendor_id',Auth::user()->id)->get();
        $top_sellings=OrderItem::where('vendor_id',Auth::user()->id)->orderBy('quantity', 'DESC')->paginate(12);
        $product=Product::where('user_id',Auth::user()->id)->count();
        $active=Product::where('user_id',Auth::user()->id)->where('status',1)->count();
        $out_of_stock=Product::where('user_id',Auth::user()->id)->where('quantity','<=' , 5)->count();
        $sells = OrderItem::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))->where('vendor_id',Auth::user()->id)
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count', 'month_name');

$labels = $sells->keys();
$data = $sells->values();
        return view('livewire.vendor.vendor-dashboard-component',['sales'=>$sales,'products'=>$products,'orders'=>$orders,'items'=>$items,
        'last_month_sale'=>$last_month_sale,'top_sellings'=>$top_sellings,'product'=>$product,'active'=>$active,
        'out_of_stock'=>$out_of_stock,'labels'=>$labels,'data'=>$data])->layout('layouts.vendor.base');
    }
}
