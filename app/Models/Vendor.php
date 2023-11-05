<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    protected $table='vendors';
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function store()
    {
        return $this->hasOne(VendorStore::class,'vendor_id');
    }
}
