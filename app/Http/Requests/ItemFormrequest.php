<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemFormrequest extends FormRequest
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
            'cat_id'=> [
                'required'
            ],
            'sub_cat_id'=> [
                'required'
            ],
            'name' => [
                'required',
                'string',
                'max:20'
            ],
            'slug' => [
                'required',
                'string'
            ],
            'description' => [
                'required',
            ],
            'meta_title' => [
                'required',
                'string'
            ],
             'meta_keyword' => [
                'required',
                'string'
            ],
            'meta_description' => [
                'required',
                'string'
            ],
        ];
    }
}
