<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "title" => "required|max:200",
            "description" => "nullable|max:200",
            "quantity" => "required|numeric|gt:0",
            "price" => "required|numeric|gt:0",
            "product_finished_at" => "nullable|after:" . now(),
            "discount_finished_at" => "nullable|after:" . now(),
            "discount" => "min:1|max:99|numeric|gt:0|nullable",
            "sub_category_id"=>"required",
            "status"=>"required",
            "discounted_price"=>"numeric|gt:0|nullable"
        ];
    }
    public function attributes()
    {
        return [
            "image1" => "Ürün Fotoğrafı-1",
            "title" => "Ürün Adı",
            "description" => "Açıklama",
            "quantity" => "Ürün Adeti",
            "price" => "Ürün Fiyatı",
            "product_finished_at" => "Ürün Yayın Bitiş Tarihi",
            "discount_finished_at" => "İndirim Yayın Bitiş Tarihi",
            "discount" => "İndirim",
            "sub_category_id"=>"Kategori",
            "status"=>"Ürün Durumu",
            "discounted_price"=>"İndirimli Fiyat"
        ];
    }
}
