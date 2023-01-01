<?php

namespace App\Http\Requests\Event;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'date' => 'date_format:Y-m-d|required',
            'description' => 'max:4095',
            'name' => 'max:255|required',
            'time' => 'date_format:H:m:s',
        ];
    }
}
