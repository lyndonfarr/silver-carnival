<?php

namespace App\Http\Requests\Address;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [];

        foreach ($this->contact_id as $key => $contactId) {
            $rules["contact_id.{$key}"] = 'required|integer|max:99999999999|exists:contacts,id';
        }

        return array_merge($rules, [
            'city' => 'max:255',
            'country' => 'max:255',
            'current' => 'boolean|nullable',
            'line_1' => 'max:255',
            'line_2' => 'max:255',
            'post_code' => 'max:255',
            'state' => 'max:255',
        ]);
    }
}
