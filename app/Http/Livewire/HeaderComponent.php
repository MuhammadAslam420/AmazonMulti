<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;
use App\Models\Category;
use App\Models\HomePageSetting;

class HeaderComponent extends Component
{
    // use WithPagination;
    // public $category_id;
    // public $search;
    // public function searchItem()
    // {
    //     $products=Product::where('category_id','like','%'.$this->category_id.'%')->orwhere('name','like','%'.$this->search.'%')->get();
    //     return view('livewire.shop-search-component',['$products'=>$products])->layout('layouts.base');
    // }
    public function render()
    {
        // //$products=Product::where('name','like','%'.$this->search.'%')->orwhere('category_id','like','%'.$this->category_id.'%')->get();
        // $categories=Category::all();
        $setting=HomePageSetting::find(1);
        return view('livewire.header-component',['setting'=>$setting]);
    }
}
