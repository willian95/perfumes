<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandStoreRequest extends FormRequest
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


    public function rules()
    {
        return [
            "name" => "required|unique:brands,name",
            "image" => "required"
        ];
    }


    public function messages()
    {
        return [
            "name.required" => "Campo nombre es requerido",
            "name.unique" => "Este nombre ya existe",
            "image.required" => "Imagen es obligatoria"
        ];
    }
}
