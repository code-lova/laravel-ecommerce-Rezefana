<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LogoFormRequest extends FormRequest
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
            'logo' => [
                'mimes:png,jpg,jpeg',
                'nullable'
            ],
            'logo2' => [
                'mimes:png,jpg,jpeg',
                'nullable'
            ],
            'favicon' => [
                'mimes:png,jpg,jpeg',
                'nullable'
            ],
        ];
    }
}
