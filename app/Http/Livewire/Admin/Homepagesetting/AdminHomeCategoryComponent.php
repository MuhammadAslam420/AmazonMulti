<?php

namespace App\Http\Livewire\Admin\Homepagesetting;

use Livewire\Component;
use App\Models\Category;
use App\Models\HomeCategory;
class AdminHomeCategoryComponent extends Component
{
    public $selected_categories = [];
    public $numberofproducts;

    public function mount()
    {
        $category = HomeCategory::find(1);
        $this->selected_categories = explode(',',$category->sel_categories);
        $this->numberofproducts = $category->no_of_products;

    }
    public function updateHomeCategory()
    {
        $category = HomeCategory::find(1);
        $category->sel_categories = implode(',', $this->selected_categories);
        $category->no_of_products = $this->numberofproducts;
        $category->save();
        session()->flash('message','Categories and Products has been Updated or Added');
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.homepagesetting.admin-home-category-component',['categories'=>$categories])->layout('layouts.admin.base');
    }
}
