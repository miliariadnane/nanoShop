<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
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
            'name' => 'required|string|max:25|unique:categories',
            'description' => 'required|string',
            'unit' => 'required|max:10',
            'price' => 'required|max:15',
            'product_quantity' => 'required',
            'sale_price' => 'required|max:15',
            'meta_title' => 'required|max:50',
            'meta_description' => 'required|max:150',
            'category' => 'required',
            'status' => 'required',
            //'picture' => 'image|mimes:jpeg,jpg|max:1024'
        ];
    }
}
