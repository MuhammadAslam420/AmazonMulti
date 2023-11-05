<?php

namespace App\Http\Livewire\Vendor;

use Livewire\Component;
use App\Models\Vendor;
use App\Models\VendorStore;
use Carbon\carbon;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class VendorStoreComponent extends Component
{
  use WithFileUploads;
  public $name;
  public $map;
  public $address;
  public $tax_no;
  public $tagline;
  public $registration_no;
  public $logo;
 
  public function mount()
  {
    $store=VendorStore::where('user_id',Auth::user()->id)->first();
    if($store)
    {
        $this->name=$store->name;
    $this->map=$store->map;
    $this->address=$store->address;
    $this->tagline=$store->tagline;
    $this->tax_no=$store->tax_no;
    $this->registration_no=$store->registration_no;
    }else
    {
        $vendor=Vendor::where('user_id',Auth::user()->id)->first();
        $store=new VendorStore();
        $store->user_id=Auth::user()->id;
        $store->vendor_id=$vendor->id;
        $store->save();
          $this->name=$store->name;
    $this->map=$store->map;
    $this->address=$store->address;
    $this->tagline=$store->tagline;
    $this->tax_no=$store->tax_no;
    $this->registration_no=$store->registration_no;
    }
  }
  public function updateStore()
  {
    $this->validate([
      'name'=>'required',
      'address'=>'required',
    ]);
    $store=VendorStore::where('user_id',Auth::user()->id)->first();
    if($this->logo)
    {
      $imagename=Carbon::now()->timestamp.'.'.$this->logo->extension();
      $this->logo->storeAs('/assets/images/vendor/stores',$imagename);
      $store->logo=$imagename;
    }
    $store->name=$this->name;
    $store->map=$this->map;
    $store->address=$this->address;
    $store->tagline=$this->tagline;
    $store->tax_no=$this->tax_no;
    $store->registration_no=$this->registration_no;
    $store->save();
    session()->flash('message','Store Setting Update Successfully');
  }
    public function render()
    {
        $vendor=Vendor::where('user_id',Auth::user()->id)->first();
        $store=VendorStore::where('vendor_id',$vendor->id)->first();
        if(!$store)
        {
          $vs=new VendorStore();
          $vs->user_id=Auth::user()->id;
          $vs->vendor_id=$vendor->id;
          $vs->save();
        }
        return view('livewire.vendor.vendor-store-component')->layout('layouts.vendor.base');
    }
}
