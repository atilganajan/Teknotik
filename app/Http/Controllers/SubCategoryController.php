<?php

namespace App\Http\Controllers;

use App\Models\MainCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategories = SubCategory::paginate(10);
        return view("admin.sub-category.sub-categories", compact("subCategories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mainCategories = MainCategory::get();

        return view("admin.sub-category.create", compact("mainCategories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            "title" => "required|max:200",
            "main_category_id" => "required"
        ]);



        SubCategory::create($formFields);

        return redirect("/")->with("message", "Alt Kategori Başarıyla Oluşturuldu");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $subCategory =  SubCategory::find($id);
        $mainCategories = MainCategory::get();
        return view("admin.sub-category.edit", compact("subCategory", "mainCategories"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "title" => "required|max:200",
            "main_category_id"=>"required"
        ]);

        $subCategory =  SubCategory::find($id);
        $subCategory->update($request->post());

        return redirect(route("sub-category.index"))->with("message", "Alt kategori başarıyla güncellendi");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subCategory = SubCategory::find($id);
        $subCategory->delete();
        return redirect(route("sub-category.index"))->with("message", "Alt kategori başarıyla silindi");
    }
}
