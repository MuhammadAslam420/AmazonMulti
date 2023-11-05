<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class AdminViewCategoryComponent extends Component
{
    use WithPagination;
    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('admin.view-categories')->with('message', 'Category has been deleted successfully!');
    }
    public function render()
    {
        $categories=Category::orderby('created_at', 'desc')->paginate(12);
        return view('livewire.admin.admin-view-category-component',['categories'=>$categories])->layout('layouts.admin.base');
    }
}
