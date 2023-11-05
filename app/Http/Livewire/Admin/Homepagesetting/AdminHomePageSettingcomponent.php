<?php

namespace App\Http\Livewire\Admin\Homepagesetting;

use Livewire\Component;
use App\Models\HomePageSetting;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class AdminHomePageSettingcomponent extends Component
{
    use WithFileUploads;
    public $name;
    public $mobile;
    public $hot_line;
    public $address;
    public $map;
    public $facebook;
    public $youtube;
    public $instagram;
    public $pintrest;
    public $tiktok;
    public $twitter;
    public $header_logo;
    public $mobile_header_logo;
    public $footer_logo;
    public $mobile_footer_logo;
    public $privacy_status;
    public $privacy;
    public $terms_status;
    public $terms;
    public $copy_right;
    public $email;
    public $new_header_logo;
    public $new_footer_logo;
    public $new_mobile_header_logo;
    public $new_mobile_footer_logo;
    public function mount()
    {
       $setting=HomePageSetting::find(1);
       if($setting)
       {
        $this->name=$setting->name;
        $this->mobile=$setting->mobile;
        $this->hot_line=$setting->hot_line;
        $this->address=$setting->address;
        $this->map=$setting->map;
        $this->facebook=$setting->facebook;
        $this->youtube=$setting->youtube;
        $this->instagram=$setting->instagram;
        $this->pintrest=$setting->pintrest;
        $this->tiktok=$setting->tiktok;
        $this->twitter=$setting->twitter;
        $this->header_logo=$setting->header_logo;
        $this->mobile_header_logo=$setting->mobile_header_logo;
        $this->footer_logo=$setting->footer_logo;
        $this->mobile_footer_logo=$setting->mobile_footer_logo;
        $this->privacy_status=$setting->privacy_status;
        $this->privacy=$setting->privacy_policy;
        $this->terms_status=$setting->terms_status;
        $this->terms=$setting->terms;
        $this->copy_right=$setting->copy_right;
        $this->email=$setting->email;
       }
       else{
        $setting=new HomePageSetting();
        $setting->name='mysite';
        $setting->save();
        $sett=HomePageSetting::find(1);
        $this->name=$sett->name;
        $this->mobile=$sett->mobile;
        $this->hot_line=$sett->hot_line;
        $this->address=$sett->address;
        $this->map=$sett->map;
        $this->facebook=$sett->facebook;
        $this->youtube=$sett->youtube;
        $this->instagram=$sett->instagram;
        $this->pintrest=$sett->pintrest;
        $this->tiktok=$sett->tiktok;
        $this->twitter=$sett->twitter;
        $this->header_logo=$sett->header_logo;
        $this->mobile_header_logo=$sett->mobile_header_logo;
        $this->footer_logo=$sett->footer_logo;
        $this->mobile_footer_logo=$sett->mobile_footer_logo;
        $this->privacy_status=$sett->privacy_status;
        $this->privacy=$sett->privacy_policy;
        $this->terms_status=$sett->terms_status;
        $this->terms=$sett->terms;
        $this->copy_right=$sett->copy_right;
        $this->email=$sett->email;
       }
    }
    public function updateHomePageSetting()
    {
      $setting=HomePageSetting::find(1);
      $setting->name=$this->name;
      $setting->mobile=$this->mobile;
      $setting->hot_line=$this->hot_line;
      $setting->address=$this->address;
      $setting->map=$this->map;
      $setting->facebook=$this->facebook;
      $setting->youtube=$this->youtube;
      $setting->instagram=$this->instagram;
      $setting->pintrest=$this->pintrest;
      $setting->tiktok=$this->tiktok;
      $setting->twitter=$this->twitter;
      if($this->new_header_logo)
      {
        $imageName =Carbon::now()->timestamp.'.'.$this->new_header_logo->extension();
        $this->new_header_logo->storeAs('assets/images',$imageName);
        $setting->header_logo=$imageName;
      }

      if($this->new_mobile_header_logo)
      {
        $imageName =Carbon::now()->timestamp.'.'.$this->new_mobile_header_logo->extension();
        $this->new_mobile_header_logo->storeAs('assets/images',$imageName);
        $setting->mobile_header_logo=$imageName;
      }

      if($this->new_footer_logo)
      {
        $imageName =Carbon::now()->timestamp.'.'.$this->new_footer_logo->extension();
        $this->new_footer_logo->storeAs('assets/images',$imageName);
        $setting->footer_logo=$imageName;
      }

      if($this->new_mobile_footer_logo)
      {
        $imageName =Carbon::now()->timestamp.'.'.$this->new_mobile_footer_logo->extension();
        $this->new_mobile_footer_logo->storeAs('assets/images',$imageName);
        $setting->mobile_footer_logo=$imageName;
      }

      $setting->privacy_status=$this->privacy_status;
      $setting->privacy_policy=$this->privacy;
      $setting->terms_status=$this->terms_status;
      $setting->terms=$this->terms;
      $setting->copy_right=$this->copy_right;
      $setting->email=$this->email;
      $setting->save();
       //session()->flash('message','Success');
       return redirect()->route('admin.home-page-setting')->with('message','Home Page & Business Setting has been updated successfully!');
    }
    public function render()
    {
        return view('livewire.admin.homepagesetting.admin-home-page-settingcomponent')->layout('layouts.admin.base');
    }
}
