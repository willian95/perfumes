<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TopProductStoreRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            "product_id" => "required|unique:top_products,product_id|exists:products,id"
        ];
    }

    public function messages(){

        return[

            "product_id.required" => "Debe seleccionar un producto",
            "product_id.unique" => "Este producto ya está en la lista",
            "product_id.exists" => "Debe seleccionar un producto válido",

        ];

    }
}
