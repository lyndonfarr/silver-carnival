<?php

namespace App\Http\Requests\Contact;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'description' => 'max:255',
            'dob' => 'date_format:Y-m-d|before:now',
            'first_name' => 'required|max:255',
            'last_name' => 'max:255',
            'middle_names' => 'max:255',
            'nationality' => 'max:255',
            'nickname' => 'max:255',
        ];
    }
}
