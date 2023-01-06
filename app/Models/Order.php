<?php

namespace App\Models;

use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        "phone",
        "address",
        "user_id",
        "status",
        "total",
        "total_discount",
        "base_total",
        "name"
    ];

    public function items(){
      return  $this->hasMany(OrderItem::class);
    }

}
