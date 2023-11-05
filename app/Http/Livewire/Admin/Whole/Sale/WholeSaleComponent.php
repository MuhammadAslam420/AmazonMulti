<?php

namespace App\Http\Livewire\Admin\Whole\Sale;

use Livewire\Component;
use App\Models\HoleSale;
use Livewire\WithPagination;

class WholeSaleComponent extends Component
{
    use WithPagination;
    public $qty;
    public $percentage;

    // protected $rules=[
    //     'qty'=>'required|integer|hole_sales:unique()',
    //     'percentage'=>'required|integer|hole_sales:unique()'
    // ];
    public function addNew()
    {

        $sale=new HoleSale();
        $sale->qty=$this->qty;
        $sale->percentage=$this->percentage;
        $sale->save();
        return redirect()->route('admin.wholesale')->with('message','Added Successfully!');
    }
    public function deleteSale($id)
    {
       $sale=HoleSale::find($id);
       $sale->delete();
       return redirect()->route('admin.wholesale')->with('message','Added Successfully!');
    }
    public function render()
    {
        $sales=HoleSale::orderby('id','desc')->paginate(5);
        return view('livewire.admin.whole.sale.whole-sale-component',['sales'=>$sales])->layout('layouts.admin.base');
    }
}
