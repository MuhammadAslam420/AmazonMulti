<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Subscribe;

class SubscriptionMailComponent extends Component
{
    public $wmail;
    public function sendmail()
    {
        $mail=new Subscribe();
        $mail->email=$this->wmail;
        $mail->save();
    }
    public function render()
    {
        return view('livewire.subscription-mail-component');
    }
}
