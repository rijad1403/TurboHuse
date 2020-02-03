<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItem extends FormRequest
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
            'title' => 'required',
            'price' => 'required|numeric',
            'car' => 'required',
            'body' => 'required',
            'releaseYear' => 'required|numeric|between:1901,2155'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Polje sa nazivom artikla je obavezno.',
            'body.required'  => 'Polje sa opisom artikla  je obavezno.',
            'car.required' => 'Polje sa proizvođačem artikla je obavezno.',
            'releaseYear.required' => 'Polje sa godinom proizvodnje vozila je obavezno.',
            'releaseYear.numeric' => 'Za polje sa godinom proizvodnje unešena vrijednost mora biti cijeli broj. Npr. 2004.',
            'releaseYear.between' => 'Za godinu proizvodnje unešena vrijednost ne smije biti manja od 1901 i veća od 2155.',
            'price.required' => 'Polje sa cijenom artikla je obavezno.',
            'price.numeric' => 'Za polje sa cijenom artikla unešena vrijednost mora biti cijeli broj. Npr. 400.'

        ];
    }
}
