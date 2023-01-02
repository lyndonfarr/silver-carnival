<?php

namespace App\Http\Requests\Contact;

use App\ContactExtra;
use Illuminate\Validation\Rule;
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
        $rules = [];

        $contactExtraTypeRule = Rule::in(config('enums.contact_extra_types'));
        $contactExtraValueRule = 'required|max:255';

        if (isset($this->new_contact_extras)) {
            foreach ($this->new_contact_extras as $index => $newContactExtra) {
                $rules["new_contact_extras.{$index}.type"] = $contactExtraTypeRule;
                $rules["new_contact_extras.{$index}.value"] = $contactExtraValueRule;
            }
        }

        if (isset($this->found_address_id)) {
            foreach ($this->found_address_id as $key => $foundAddressId) {
                $rules["found_address_id.{$key}"] = 'required|integer|max:99999999999|exists:addresses,id';
            }
        }

        if (isset($this->new_addresses)) {
            foreach ($this->new_addresses as $index => $newAddress) {
                $rules["new_addresses.{$index}.city"] = 'max:255';
                $rules["new_addresses.{$index}.country"] = 'max:255';
                $rules["new_addresses.{$index}.current"] = 'boolean|nullable';
                $rules["new_addresses.{$index}.line_1"] = 'max:255';
                $rules["new_addresses.{$index}.line_2"] = 'max:255';
                $rules["new_addresses.{$index}.post_code"] = 'max:255';
                $rules["new_addresses.{$index}.state"] = 'max:255';
            }
        }

        return array_merge($rules, [
            'dob' => 'date_format:Y-m-d|before:now|nullable',
            'dod' => 'date_format:Y-m-d|before:now|nullable',
            'full_name' => 'required|max:255',
            'nationality' => 'max:255',
            'nickname' => 'max:255',
            'notes' => 'max:4095',
        ]);
    }
}
