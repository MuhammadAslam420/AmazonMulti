<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorStore extends Model
{
    use HasFactory;
    protected $table='vendor_stores';
    public function vendor()
    {
        return $this->belongsTo(Vendor::class,'vendor_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function orderItem()
    {
        return $this->belongsTo(store::class);
    }
    public function products()
    {
        return $this->haMany(Product::class,'user_id');
    }
}
