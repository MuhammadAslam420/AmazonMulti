<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class TrendingCategoriesComponent extends Component
{
    public function render()
    {
        $categories=Category::all();
        return view('livewire.trending-categories-component',['categories'=>$categories]);
    }
}
