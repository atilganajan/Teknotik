<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "description",
        "status",
        "price",
        "quantity",
        "image1",
        "image2",
        "image3",
        "image1_id",
        "image2_id",
        "image3_id",
        "discount",
        "discounted_price",
        "discount_finished_at",
        "product_finished_at",
        "sub_category_id"
    ];

    public function category()
    {
        return  $this->belongsTo("App\Models\SubCategory", "sub_category_id");
    }

    public function scopeFilter($query, array $products)
    {
         if($products["category"]?? false){
            $query->where("sub_category_id",   request("category") );
         }

        if ($products["search"] ?? false) {
            $query->where("title", "like", "%" . request("search") . "%")
                ->orWhere("description", "like", "%" . request("search") . "%");
        }
    }

    public function questionComments(){
      return  $this->hasMany(ProductQuestion::class);
    }

    
}
