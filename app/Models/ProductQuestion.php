<?php

namespace App\Models;

use App\Models\User;
use App\Models\ProductAnswer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductQuestion extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "question_comment",
        "product_id"
    ];

    public function user(){
        return $this->belongsTo(User::class,"user_id");
    }

    public function response(){
        return $this->hasOne(ProductAnswer::class,"product_question_id","id")->with("user");
        
    }
}
