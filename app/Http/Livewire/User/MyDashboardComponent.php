<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Order;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class MyDashboardComponent extends Component
{
    use WithPagination;
    public $name;
    public $email;
    public $password;
    public $username;
    public $mobile;
    public function mount()
    {
        $user=User::find(Auth::user()->id);
        $this->name=$user->name;
        $this->email=$user->email;
        $this->password=$user->password;
        $this->username=$user->username;
        $this->mobile=$user->mobile;

    }
    public function updateUser()
    {
        $user=User::find(Auth::user()->id);
        $user->name = $this->name;
        $user->username = $this->username;
        $user->email = $this->email;
        $user->mobile = $this->mobile;
        $user->password = Hash::make($this->password);
        $user->save();
        return redirect()->route('my.dashboard')->with('message','User Profile has been updated!');



    }
    public function render()
    {
        $myOrders=Order::where('user_id',Auth::user()->id)->count();
        $cost=Order::where('user_id',Auth::user()->id)->sum('total');
        $orders=Order::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->limit(12)->get();
        return view('livewire.user.my-dashboard-component',['orders'=>$orders,'cost'=>$cost, 'myOrders'=> $myOrders])->layout('layouts.base');
    }
}
