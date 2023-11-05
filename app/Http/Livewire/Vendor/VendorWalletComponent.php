<?php

namespace App\Http\Livewire\Vendor;

use Livewire\Component;
use App\Models\Wallet;
use Livewire\WithPagination;

class VendorWalletComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $wallets=Wallet::paginate(12);
        return view('livewire.vendor.vendor-wallet-component',['wallets'=>$wallets])->layout('layouts.vendor.base');
    }
}
