<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable=[
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
        "discount_finished_at",
        "product_finished_at"
    ];
}
