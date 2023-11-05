<?php

namespace App\Http\Livewire\Admin\Homepagesetting;

use Livewire\Component;
use App\Models\Banner;
class AdminHomeSliderComponent extends Component
{
    public function deleteSlider($slider_id)
    {
        $slider=Banner::find($slider_id);
        $slider->delete();
        session()->flash('message','Slider Has been Deleted by you!');
    }
      public function render()
      {
          $sliders =Banner::all();
        return view('livewire.admin.homepagesetting.admin-home-slider-component',['sliders'=>$sliders])->layout('layouts.admin.base');
    }
}
