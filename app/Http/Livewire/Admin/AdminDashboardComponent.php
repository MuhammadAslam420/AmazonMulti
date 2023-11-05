<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use App\Models\User;
class AdminDashboardComponent extends Component
{ 
    use WithPagination;
    public function render()
    {
        
        $products=Product::count();
        $date = Carbon::today()->subDays(30);
        $earnings=Order::where('created_at',$date)->sum('total');
        $totalEarning=Order::sum('total');
        $orders=Order::count();
        $pending=Order::where('status','cancel')->count();
        $deliver=Order::where('status','delivered')->count();
        $ordered=Order::where('status', 'ordered')->count();
        //$earnTotal=Order::all();
        $sells = OrderItem::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count', 'month_name');

        $labels = $sells->keys();
        $data = $sells->values();
        $users=User::where('atype','USR')->orderBy('created_at','desc')->paginate(12);
        return view('livewire.admin.admin-dashboard-component',[
            'pending'=>$pending, 'deliver'=> $deliver, 'ordered'=> $ordered,
            'totalEarning'=> $totalEarning, 'orders'=> $orders, 'labels'=> $labels, 'data'=>$data,
            'products'=> $products,'earnings'=> $earnings,'users'=>$users])->layout('layouts.admin.base');
    }
}
