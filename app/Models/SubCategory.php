<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        "main_category_id"
    ];

    public function mainCategory(){
        return $this->belongsTo("App\Models\MainCategory");
    }

    public function products(){
        return $this->hasMany("App\Models\Product");
    }

}
