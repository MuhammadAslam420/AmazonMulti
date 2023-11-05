<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;
class AdminViewActiveProductComponent extends Component
{
    use WithPagination;
    public function updateStatus($id, $status)
    {
        $product = Product::find($id);
        $product->status = $status;
        $product->save();
        return redirect()->route('admin.view-all-active-products')->with('message', 'Status has been updated successfully');
    }
    public function render()
    {
        $products = Product::where('status', '=', 1)->paginate(12);
        return view('livewire.admin.admin-view-active-product-component', ['products' => $products])->layout('layouts.admin.base');
    }
}
