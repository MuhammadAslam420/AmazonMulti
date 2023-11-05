<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use carbon\Carbon;
use Livewire\WithFileUploads;
use App\Models\SubCategory;
use PhpParser\Node\Stmt\TryCatch;

class AdminCategoryComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $logo;
    public $s_name;
    public $s_slug;
    public $category_id;

    public function generateslug()
    {
        $this->slug =Str::slug($this->name);
    }
    public function generateSubslug()
    {
        $this->s_slug = Str::slug($this->s_name);
    }
    protected $rules=[
        's_name'=>'required',
        'category_id'=>'required'
    ];

    public function storeCategory()
    {
        $this->validate([
            'name'=>'required',
            'slug'=>'required',
            'logo'=>'required'
        ]);

         $category=new Category();
         $category->name=$this->name;
         $category->slug=$this->slug;
         $imagename=Carbon::now()->timestamp.'.'.$this->logo->extension();
         $this->logo->storeAs('assets/images',$imagename);
         $category->logo=$imagename;
         $category->save();
         return redirect()->route('admin.categories')->with('message','Category is added right now by you successfully!');
         //session()->flash('message','Category is added right now by you successfully!');

    }
    public function addSubCategory()
    {
        $this->validate();
        $sub = new SubCategory();
        $sub->name = $this->s_name;
        $sub->slug = $this->s_slug;
        $sub->category_id = $this->category_id;
        $sub->save();
        return redirect()->route('admin.categories')->with('message', 'SubCategory is added right now by you successfully!');
    }
    public function deleteSubCategory($id)
    {
       $sub=SubCategory::find($id);
       $sub->delete();
        return redirect()->route('admin.categories')->with('message', 'SubCategory is deleted right now by you successfully!');

    }
    public function render()
    {
        $categories=Category::all();
        $subcategories=SubCategory::orderBy('id','desc')->paginate(10);
        return view('livewire.admin.category.admin-category-component',['categories'=> $categories, 'subcategories'=> $subcategories])->layout('layouts.admin.base');
    }
}
