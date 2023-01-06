<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductAnswer extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "product_question_id",
        "answer_comment",
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
