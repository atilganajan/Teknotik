<?php

namespace App\Http\Controllers;

use App\Models\MainCategory;
use Illuminate\Http\Request;

class MainCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $mainCategories= MainCategory::paginate(10);
      return view("admin.main-category.main-categories",compact("mainCategories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view("admin.main-category.create");
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
        ]);
        MainCategory::create($formFields);

        return redirect("/")->with("message","Ana Kategori Başarıyla Oluşturuldu");
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
        $mainCategory=  MainCategory::find($id);

        return view("admin.main-category.edit",compact("mainCategory"));
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
            "title"=>"required|max:200"
        ]);

        $mainCategory=  MainCategory::find($id);
        $mainCategory->update($request->post());

        return redirect(route("main-category.index"))->with("message","Ana kategori başarıyla güncellendi");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mainCategory= MainCategory::find($id);
        $mainCategory->delete();
        return redirect(route("main-category.index"))->with("message","Ana kategori başarıyla silindi");
    }
}
