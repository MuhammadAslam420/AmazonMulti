<?php

namespace App\Http\Livewire\Vendor;

use Livewire\Component;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class VendorProfileComponent extends Component

{
    use WithFileUploads;
    public $name;
    public $username;
    public $email;
    public $mobile;
    public $address;
    public $map;
    public $tiktok;
    public $facebook;
    public $youtube;
    public $instagram;
    public $whatsapp;
    public $profile;
    public $new;

    public function mount()
    {
        $user=User::find(Auth::user()->id);
        $this->name=$user->name;
        $this->username=$user->username;
        $this->email=$user->email;
        $this->profile=$user->profile;
       $vendor=Vendor::where('user_id',Auth::user()->id)->first();
       if($vendor)
       {
            $this->mobile=$user->vendor->mobile;
        $this->address=$user->vendor->address;
        $this->map=$user->vendor->map;
        $this->facebook=$user->vendor->facebook;
        $this->instagram=$user->vendor->instagram;
        $this->tiktok=$user->vendor->tiktok;
        $this->youtube=$user->vendor->youtube;
        $this->whatsapp=$user->vendor->whatsapp;
        
       }else
       {
           $vendor=new Vendor();
           $vendor->user_id=Auth::user()->id;
           $vendor->save();
             $this->mobile=$user->vendor->mobile;
        $this->address=$user->vendor->address;
        $this->map=$user->vendor->map;
        $this->facebook=$user->vendor->facebook;
        $this->instagram=$user->vendor->instagram;
        $this->tiktok=$user->vendor->tiktok;
        $this->youtube=$user->vendor->youtube;
        $this->whatsapp=$user->vendor->whatsapp;
           
       }
    }
    public function updateVendor()
    {
   

        $user=User::find(Auth::user()->id);
        $user->name=$this->name;
        $user->username=$this->username;
        $user->email=$this->email;
        if($this->new)
        {
            if($this->profile)
            {
                unlink("assets/images/vendor/".$this->profile);
            }
            $imagename=Carbon::now()->timestamp.'.'.$this->new->extension();
            $this->new->storeAs('assets/images/vendor',$imagename);
            $user->profile=$imagename;
        }
        $user->save();
        $user->vendor->mobile=$this->mobile;
        $user->vendor->address=$this->address;
        $user->vendor->map=$this->map;
        $user->vendor->facebook=$this->facebook;
        $user->vendor->whatsapp=$this->whatsapp;
        $user->vendor->instagram=$this->instagram;
        $user->vendor->tiktok=$this->tiktok;
        $user->vendor->youtube=$this->youtube;
        $user->vendor->save();
        session()->flash('message','Vendor Profile Updated Successfully');
    }
    public function render()
    {
        $vendor=Vendor::where('user_id',Auth::user()->id)->first();
        if(!$vendor)
        {
            $add=new Vendor();
            $add->user_id=Auth::user()->id;
            $add->save();
        }

        return view('livewire.vendor.vendor-profile-component')->layout('layouts.vendor.base');
    }
}
