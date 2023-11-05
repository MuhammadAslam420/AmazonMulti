<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use App\Models\Contact;
use Carbon\Carbon;
class TopHeaderComponent extends Component
{
    public function render()
    {
        $today=Carbon::today();
        $orders=Order::where('created_at','>=',Carbon::today())->count();
        $contacts=Contact::where('created_at','>=', $today)->count();
        return view('livewire.admin.top-header-component',['today'=>$today,'orders'=>$orders,'contacts'=>$contacts]);
    }
}
