<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Banner;

class HomeBannerComponent extends Component
{
    public function render()
    {
        $banners=Banner::where('position',1)->where('status',1)->get();
        return view('livewire.home-banner-component',['banners'=>$banners]);
    }
}
