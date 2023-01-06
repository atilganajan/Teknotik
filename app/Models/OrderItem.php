<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable = [
        "product_id",
        "quantity",
        "order_id",
        "product_discounted_price",
        "product_price"
    ];

    public function product(){
       return $this->belongsTo(Product::class,"product_id");
    }
}
