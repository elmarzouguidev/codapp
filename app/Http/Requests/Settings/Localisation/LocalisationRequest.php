<?php

namespace App\Http\Requests\Settings\Localisation;

use Illuminate\Foundation\Http\FormRequest;

class LocalisationRequest extends FormRequest
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
            'localisation_country' => 'required|string',
            'localisation_timezone' => 'required|string',
            'currency_code' => 'required|string',
            'currency_symbole' => 'required|string',
            'default_lng' => 'required|string',
    
        ];
    }
}
