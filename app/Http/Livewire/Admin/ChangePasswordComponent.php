<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class ChangePasswordComponent extends Component
{
    public $current_password;
    public $password;
    public $password_confirmation;

    public function update($field)
    {
        $this->validateOnly($field,[
            'current_password'=>'required',
            'password'=>'required|min:8|confirmed|different:current_password',
        ]);

    }

    public function updatepassword()
    {
        $this->validate([
            'current_password'=>'required',
            'password'=>'required|min:8|confirmed|different:current_password',

        ]);
        if(Hash::check($this->current_password,Auth::user()->password))
        {
            $user = User::findOrFail(Auth::user()->id);
            $user->password=Hash::make($this->password);
            $user->save();
            return session()->flash('message','Password Has Been Changed Successfully!');
        }
        else
        {
            return session()->flash('message','Password does not match!!');

        }
    }
    public function render()
    {
        return view('livewire.admin.change-password-component')->layout('layouts.admin.base');
    }
}
