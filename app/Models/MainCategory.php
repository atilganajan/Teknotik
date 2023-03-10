<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];


    
    public function subCategories(){
   return $this->hasMany("App\Models\SubCategory");
    }


}
