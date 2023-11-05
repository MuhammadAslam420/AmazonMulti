<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table='products';
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function orderItems()
 {
      return $this->hasMany(OrderItem::class,'product_id');
 }
 public function subcategories(){
     return $this->belongsTo(Subcategory::class,'subcategory_id');

 }
 public function attributes()
 {
    return $this->hasMany(ProductAttribute::class,'product_id');
}
public function store()
{
    return $this->belongsTo(VendorStore::class,'user_id');
}
}
