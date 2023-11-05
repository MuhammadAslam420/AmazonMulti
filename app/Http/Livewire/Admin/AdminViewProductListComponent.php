<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;

class AdminViewProductListComponent extends Component
{
    use WithPagination;
    public function updateStatus($id,$status)
    {
        $product=Product::find($id);
        $product->status=$status;
        $product->save();
        return redirect()->route('admin.view-product-list')->with('message','Status has been updated successfully');

    }
    public function deleteProduct($id)
    {
        $product=Product::find($id);
        $product->delete();
        return redirect()->route('admin.view-product-list')->with('warning', 'Product has been deleted successfully');

    }
    public function render()
    {
        $products=Product::paginate(12);
        return view('livewire.admin.admin-view-product-list-component',['products'=>$products])->layout('layouts.admin.base');
    }
}
