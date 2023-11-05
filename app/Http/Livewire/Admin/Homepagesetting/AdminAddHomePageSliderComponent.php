<?php

namespace App\Http\Livewire\Admin\Homepagesetting;

use Livewire\Component;
use App\Models\Banner;
use carbon\Carbon;
use Livewire\WithFileUploads;
class AdminAddHomePageSliderComponent extends Component
{
    use WithFileUploads;
    public $position;
    public $link;
    public $banner;
    public $status;

    public function mount()
    {
        $this->status=0;
    }
    public function addSlide()
    {
    $slider=new Banner();
    $slider->position=$this->position;

    $imagename=Carbon::now()->timestamp.'.'.$this->banner->extension();
    $this->banner->storeAs('assets/images',$imagename);
    $slider->banner=$imagename;
    $slider->link=$this->link;
    $slider->status=$this->status;
    $slider->save();
    return redirect()->route('admin.add-home-slider')->with('message','Slider is successfully Added!');
   // session()->flash('message','Slider is successfully Added!');

    }
    public function render()
    {
        $sliders =Banner::all();
        return view('livewire.admin.homepagesetting.admin-add-home-page-slider-component',['sliders'=>$sliders])->layout('layouts.admin.base');;
    }
}
