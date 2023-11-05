<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use carbon\Carbon;
use Livewire\WithFileUploads;
use App\Models\SubCategory;
use PhpParser\Node\Stmt\TryCatch;
use Livewire\WithPagination;
class EditCategoryComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $name;
    public $slug;
    public $logo;
    public $newlogo;
    public $category_id;
    public function mount($id)
    {
       $this->category_id=$id;
       $category=Category::find($this->category_id);
       $this->name=$category->name;
       $this->slug=$category->slug;
       $this->logo=$category->logo;

    }

    public function generateslug()
    {
        $this->slug =Str::slug($this->name);
    }

    public function storeCategory()
    {
        $this->validate([
            'name'=>'required',
            'slug'=>'required',
        ]);

         $category=Category::find($this->category_id);
         $category->name=$this->name;
         $category->slug=$this->slug;
         if($this->newlogo)
         {
            $imagename=Carbon::now()->timestamp.'.'.$this->newlogo->extension();
            $this->newlogo->storeAs('assets/images',$imagename);
            $category->logo=$imagename;
         }
         $category->save();
         return redirect()->route('admin.view-categories')->with('message','Category is updated right now by you successfully!');
         //session()->flash('message','Category is added right now by you successfully!');

    }
    public function render()
    {
        $categories=Category::orderBy('id','desc')->paginate(12);
        return view('livewire.admin.category.edit-category-component',['categories'=> $categories])->layout('layouts.admin.base');
    }
}
