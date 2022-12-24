<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
            "image1"=>"required",
            "title"=>"required|max:200",
            "description"=>"nullable|max:200",
            "quantity"=>"required|numeric|gt:0",
            "price"=>"required|numeric|gt:0"
        ];
    }
    public function attributes (){
        return[
            "image1"=>"Ürün Fotoğrafı-1",
            "title"=>"Ürün Adı",
            "description"=>"Açıklama",
            "quantity"=>"Ürün Adeti",
            "price"=>"Ürün Fiyatı"

        ];
    }


}
