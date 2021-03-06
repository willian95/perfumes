<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            "name" => "required",
            "category" => "required|integer|exists:categories,id",
            "brand" => "required|integer|exists:brands,id",
            "image" => "required",
            "description" => "required"
        ];
    }

    public function messages(){

        return[

            "name.required" => "Nombre del producto es requerido",
            "category.required" => "Categoría del producto es requerido",
            "category.integer" => "Categoría seleccionada no es válida",
            "category.exists" => "Categoría seleccionada no es válida",
            "brand.required" => "Marca del producto es requerido",
            "brand.integer" => "Marca seleccionada no es válida",
            "brand.exists" => "Marca seleccionada no es válida",
            "image.required" => "Imagen del producto es requerido",
            "description.required" => "Descripción es requerida"

        ];

    }

}
