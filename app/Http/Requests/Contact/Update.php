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
            'dob' => 'date_format:Y-m-d|before:now',
            'full_name' => 'required|max:255',
            'nationality' => 'max:255',
            'nickname' => 'max:255',
            'notes' => 'max:4095',
        ];
    }
}
