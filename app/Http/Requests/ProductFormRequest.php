<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
            'cat_id' => [
                'required',
                'integer'
            ],
            'sub_cat_id' => [
                'required',
                'integer'
            ],
            'end_cat_id' => [
                'required',
                'integer'
            ],
            'name' => [
                'string',
                'required',
                'max:50',
            ],
            'slug' => [
                'string',
                'required'
            ],
            'brand' => [
                'nullable',
            ],
            'short_description' => [
                'required'
            ],
            'description' => [
                'required',
                'max:5000'
            ],
            'original_price' => [
                'required',
                'integer'
            ],
            'selling_price' => [
                'required',
                'integer'
            ],
            'quantity' => [
                'required',
                'integer'
            ],
            'trending' => [
                'nullable',
            ],
            'status' => [
                'nullable',
            ],
            'meta_title' => [
                'required',
                'string',
                'max:255'
            ],
            'meta_keyword' => [
                'required',
            ],
            'meta_description' => [
                'required',
            ],
            /*'product_size_id' => [
                'required',
            ],
            'product_color_id' => [
                'required',
            ],
            */
            'image' => [
                'nullable'
                //'mimes:png,jpg,jpeg',

            ],

        ];
    }
}
