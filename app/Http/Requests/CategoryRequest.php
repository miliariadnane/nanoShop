<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'category_slug' => 'required|string|max:50',
            'type' => 'required|string',
            'status' => 'required',
            //'picture' => 'image|mimes:jpeg,jpg|max:1024|dimensions:min_height=500' // 1024 kb
        ];
    }
}
