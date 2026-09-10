<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SitesettingFormRequest extends FormRequest
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
            'title' => [
                'string',
                'required'
            ],
            'site_name' => [
                'string',
                'required',
                'max:255'
            ],
            'keywords' => [
                'string'
            ],
            'site_desc' => [
                'required'
            ],
            'live_chat_id' => [
                'nullable',
                'string'
            ],
            'email' => [
                'required',
                'email'
            ],
            'mobile' => [
                'integer',
                'required',
            ],
            'address' => [
                'required',
                'string'
            ],
            'opening_days' => [
                'required',
            ]
        ];
    }
}
