<?php

namespace App\Http\Requests\Contact;

use App\ContactExtra;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
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

        $contactExtraTypeRule = Rule::in([ContactExtra::TYPE_INSTAGRAM, ContactExtra::TYPE_PHONE]);
        $contactExtraValueRule = 'required|max:255';

        if (isset($this->new_contact_extras)) {
            foreach ($this->new_contact_extras as $index => $newContactExtra) {
                $rules["new_contact_extras.{$index}.type"] = $contactExtraTypeRule;
                $rules["new_contact_extras.{$index}.value"] = $contactExtraValueRule;
            }
        }
        
        if (isset($this->contact_extras)) {
            foreach ($this->contact_extras as $index => $contactExtra) {
                $rules["contact_extras.{$index}.id"] = 'integer|exists:contact_extras';
                $rules["contact_extras.{$index}.type"] = $contactExtraTypeRule;
                $rules["contact_extras.{$index}.value"] = $contactExtraValueRule;
            }
        }

        return array_merge($rules, [
            'dob' => 'date_format:Y-m-d|before:now|nullable',
            'full_name' => 'required|max:255',
            'nationality' => 'max:255',
            'nickname' => 'max:255',
            'notes' => 'max:4095',
        ]);
    }
}
