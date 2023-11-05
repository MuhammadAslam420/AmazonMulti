<?php

namespace App\Http\Livewire\Admin\Vendor;

use Livewire\Component;
use App\Models\Vendor;

class VendorDetailComponent extends Component
{
    public $user_id;
    public function mount($id)
    {
        $this->user_id=$id;
    }
    public function render()
    {
        $vendor=Vendor::where('user_id',$this->user_id)->first();
        return view('livewire.admin.vendor.vendor-detail-component',['vendor'=>$vendor])->layout('layouts.admin.base');
    }
}
