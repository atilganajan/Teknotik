<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\MainCategory;
use Illuminate\Http\Request;

class PageController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
       $products= Product::latest()->paginate(24);
       $mainCategories=MainCategory::get();
       
        return view('home',compact("products","mainCategories"));
    }


}
