<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class AdminViewVendorComponent extends Component
{
    use WithPagination;
    public function changeStatus($id,$status)
    {
      $user=User::find($id);
      $user->active_status=$status;
      $user->save();
      return redirect()->route('admin.view-vendors')->with('message','status has been changed successfully! ');
    }
    public function render()
    {
        $users=User::where('atype','VEN')->paginate(12);
        return view('livewire.admin.admin-view-vendor-component',['users'=> $users])->layout('layouts.admin.base');
    }
}
