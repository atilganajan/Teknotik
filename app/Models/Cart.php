<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id"
    ];
    protected $appends = ["total", "discount", "basetotal"];

    public function getTotalAttribute()
    {
        $total = 0;
        foreach ($this->items as $item) {
            if ($item->product->discounted_price) {
                $total += ($item->quantity * $item->product->discounted_price);
            } else {
                $total += ($item->quantity * $item->product->price);
            }
        }
        return $total;
    }

    public function getDiscountAttribute()
    {
        $discount = 0;

        foreach ($this->items as $item) {

            if ($item->product->discounted_price) {
                $discount += ($item->quantity * ($item->product->price - $item->product->discounted_price));
            }
        }

        return $discount;
    }

    public function getBasetotalAttribute()
    {
        $baseTotal = 0;
        foreach ($this->items as $item) {
                $baseTotal += ($item->quantity * $item->product->price);
        }
        return $baseTotal;
    }

    public function items()
    {
        return $this->hasMany("App\Models\CartItem");
    }

    public function user()
    {
        return $this->belongsTo("App\Models\User");
    }
}
