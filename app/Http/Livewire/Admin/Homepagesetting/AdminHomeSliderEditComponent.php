<?php

namespace App\Http\Livewire\Admin\Homepagesetting;

use Livewire\Component;
use App\Models\Banner;
use carbon\Carbon;
use Livewire\WithFileUploads;

class AdminHomeSliderEditComponent extends Component
{
    use WithFileUploads;
    public $position;
    public $link;
    public $banner;
    public $status;
    public $newimage;
    public $slider_id;

    public function mount($slider_id)
    {
        $slider=Banner::find($slider_id);
        $this->position=$slider->position;
        $this->link=$slider->link;
        $this->banner=$slider->banner;
        $this->status=$slider->status;
        // $this->newimage=$slider->title;
        $this->slider_id=$slider->id;
    }
public function updateSlide()
{
    $slider=Banner::find($this->slider_id);
        $slider->position=$this->position;
        $slider->link=$this->link;
        if($this->newimage)
        {
         $imagename=Carbon::now()->timestamp.'.'.$this->newimage->extension();
         $this->newimage->storeAs('assets/images',$imagename);
          $slider->banner=$imagename;
        }
        $slider->status=$this->status;
        $slider->save();
    session()->flash('message','Slider is successfully Added!');


}
    public function render()
    {
        return view('livewire.admin.homepagesetting.admin-home-slider-edit-component')->layout('layouts.admin.base');
    }
}
