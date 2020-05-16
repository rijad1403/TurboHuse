<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Registration extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'type' => 'nullable',
            'city' => 'required',
            'state' => 'required',
            'street' => 'required',
            'phone' => 'required',
            'zip_code' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Polje sa imenom je obavezno.',
            'email.required' => 'Polje sa emailom je obavezno.',
            'password.required' => 'Polje sa lozinkom je obavezno.',
            'city.required' => 'Polje sa gradom je obavezno.',
            'state.required' => 'Polje sa državom je obavezno.',
            'street.required' => 'Polje sa ulicom je obavezno.',
            'phone.required' => 'Polje sa telefonom je obavezno.',
            'zip_code.required' => 'Polje sa poštanskim brojem je obavezno.',

        ];
    }
}
