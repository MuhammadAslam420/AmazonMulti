<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminProfileComponent extends Component
{
    public $name;
    public $username;
    public $email;
    public $mobile;
    public function mount()
    {
        $user=User::find(Auth::user()->id);
        $this->name=$user->name;
        $this->username = $user->username;
        $this->email = $user->email;
        $this->mobile = $user->mobile;

    }
    public function updateAdmin()
    {
        $user = User::find(Auth::user()->id);
        $user->name=$this->name;
        $user->username=$this->username;
        $user->email=$this->email;
        $user->mobile=$this->mobile;
        $user->save();
        return session()->flash('message','profile updated');

    }
    public function render()
    {
        return view('livewire.admin.admin-profile-component')->layout('layouts.admin.base');
    }
}
