<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProfile extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Authorization logic in ProfilePolicy
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
            'biography' => 'nullable',
            'address_1' => 'required|alpha_dash',
            'address_2' => 'nullable',
            'city' => 'required|alpha_dash|between:2,58',
            'state' => 'required|alpha|between:2,3',
            'country' => 'required|alpha|between:4,84',
            'postal_code' => 'required|alpha_num|max:12',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [];
    }
}
