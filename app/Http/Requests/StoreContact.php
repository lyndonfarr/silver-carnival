<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContact extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'description' => 'max:255',
            'dob' => 'date_format:Y-m-d|before:now',
            'first_name' => 'required|max:255',
            'last_name' => 'max:255',
            'middle_names' => 'max:255',
            'nationality' => 'max:255',
            'nickname' => 'max:255',
            'notes' => 'max:4095',
        ];
    }
}
