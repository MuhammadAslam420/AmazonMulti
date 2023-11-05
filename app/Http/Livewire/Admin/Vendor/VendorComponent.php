<?php

namespace App\Http\Livewire\Admin\Vendor;

use Livewire\Component;
use App\Models\VendorStore;
use Livewire\WithPagination;
class VendorComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $vendors=VendorStore::orderBy('created_at','desc')->paginate(12);
        return view('livewire.admin.vendor.vendor-component',['vendors'=>$vendors])->layout('layouts.admin.base');
    }
}
