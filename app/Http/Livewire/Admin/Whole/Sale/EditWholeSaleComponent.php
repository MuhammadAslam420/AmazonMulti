<?php

namespace App\Http\Livewire\Admin\Whole\Sale;

use Livewire\Component;
use App\Models\HoleSale;
use Livewire\WithPagination;
class EditWholeSaleComponent extends Component
{
    use WithPagination;
    public $qty;
    public $percentage;
    public $sale_id;
    public function mount($id)
    {
        $this->sale_id=$id;
        $sale=HoleSale::find($this->sale_id);
        $this->qty=$sale->qty;
        $this->percentage=$sale->percentage;
    }

    // protected $rules=[
    //     'qty'=>'required|integer|hole_sales:unique()',
    //     'percentage'=>'required|integer|hole_sales:unique()'
    // ];
    public function editsale()
    {

        $sale=HoleSale::find($this->sale_id);
        $sale->qty=$this->qty;
        $sale->percentage=$this->percentage;
        $sale->save();
        return redirect()->route('admin.wholesale')->with('message','edit Successfully!');
    }
    public function deleteSale($id)
    {
       $sale=HoleSale::find($id);
       $sale->delete();
       return redirect()->route('admin.wholesale')->with('message','Added Successfully!');
    }
    public function render()
    {
        $sales=HoleSale::orderBy('id','desc')->paginate(3);
        return view('livewire.admin.whole.sale.edit-whole-sale-component',['sales'=>$sales])->layout('layouts.admin.base');
    }
}
