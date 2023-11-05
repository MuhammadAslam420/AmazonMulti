<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Vendor;
use Livewire\WithPagination;

class VendorListComponent extends Component
{
    use WithPagination;
    public $pagesize=10;
    public $sorting='desc';
    public $search;
    public function render()
    {
        $vendors=Vendor::where('id', 'like', '%' . $this->search . '%')
        ->orWhere('address', 'like', '%' . $this->search . '%')->orderBy('created_at',$this->sorting)->paginate($this->pagesize);

        return view('livewire.vendor-list-component',['vendors'=>$vendors,])->layout('layouts.base');
    }
}
