<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\HomePageSetting;
use App\Models\contact;

class ContactComponent extends Component
{
    public $name;
    public $email;
    public $mobile;
    public $message;

    // public function update($fields)
    // {
    //     $this->validateOnly($fields, [
    //         'name' => 'required',
    //         'email' => 'required|email',
    //         'mobile' => 'required',
    //         'message' => 'required',
    //     ]);
    // }
    public function sendMessage()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'message' => 'required',
        ]);

        $contact = new Contact();
        $contact->name = $this->name;
        $contact->email = $this->email;
        $contact->mobile = $this->mobile;
        $contact->message = $this->message;
        $contact->save();
        $this->name='';
        $this->email='';
        $this->mobile='';
        $this->message='';
        session()->flash('cont_msg', 'Message has been sent successfully!');
    }
    public function render()
    {
        $setting=HomePageSetting::find(1);
        return view('livewire.contact-component',['setting'=> $setting])->layout('layouts.base');
    }
}
