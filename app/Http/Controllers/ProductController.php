<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(12);
        return view("admin.product.products", compact("products"));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.product.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCreateRequest $request)
    {
        if ($request->hasFile("image1")) {
            $result = $request->file('image1')->storeOnCloudinary('teknotik');
            $request["image1_id"] = $result->getPublicId();
            $request["image1"] = $result->getPath();
        }
        if ($request->hasFile("image2")) {
            $result = $request->file('image2')->storeOnCloudinary('teknotik');
            $request["image2_id"] = $result->getPublicId();
            $request["image2"] = $result->getPath();
        }
        if ($request->hasFile("image3")) {
            $result = $request->file('image3')->storeOnCloudinary('teknotik');
            $request["image3_id"] = $result->getPublicId();
            $request["image3"] = $result->getPath();
        }

        // $uploadedFileUrl = Cloudinary::upload($request->file('image1')->getRealPath(), [
        //     "folder" => "teknotik"
        // ])->getSecurePath();

        Product::create($request->post());
        return redirect("/")->with("message", "Ürün başarıyla oluşturuldu!");
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
        $product = Product::find($id);

        return view("admin.product.edit", compact("product"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, $id)
    {
        
        $product = Product::find($id);

        if ($request->hasFile("image1")) {
            if ($product->image1_id) {
                Cloudinary::destroy($product->image1_id);
            }
            $result = $request->file('image1')->storeOnCloudinary('teknotik');
            $product->image1_id = $result->getPublicId();
            $product->image1 = $result->getPath();
        }

        if ($request->hasFile("image2")) {
            if ($product->image2_id) {
                Cloudinary::destroy($product->image2_id);
            }
            $result = $request->file('image2')->storeOnCloudinary('teknotik');
            $product->image2_id = $result->getPublicId();
            $product->image2 = $result->getPath();
        }

        if ($request->hasFile("image3")) {
            if ($product->image3_id) {
                Cloudinary::destroy($product->image3_id);
            }
            $result = $request->file('image3')->storeOnCloudinary('teknotik');
            $product->image3_id = $result->getPublicId();
            $product->image3 = $result->getPath();
        }
        $product->update([
            "title"=>$request->title,
            "description"=>$request->description,
            "quantity"=>$request->quantity,
            "price"=>$request->price,
            "discount"=>$request->discount,
            "discount_finished_at"=>$request->discount_finished_at,
            "product_finished_at"=>$request->product_finished_at
        ]);

        return redirect(route("admin.index"))->with("messages","Başarıyla Güncellendi");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if ($product->image1_id) {
            Cloudinary::destroy($product->image1_id);
        }
        if ($product->image2_id) {
            Cloudinary::destroy($product->image2_id);
        }
        if ($product->image3_id) {
            Cloudinary::destroy($product->image3_id);
        }
        $product->delete();
        return back()->with("message","Ürün Başarıyla Silindi");
    }
}
