<?php

namespace App\Http\Requests\Settings\General;

use Illuminate\Foundation\Http\FormRequest;

class GeneralRequest extends FormRequest
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
            'app_name' => 'required',
            'ceo' => 'required',
            'mobile' => 'required|numeric',
            'address' => 'required|string',
            'email' => 'required|email',
            'website' => 'nullable|string',
            'country' => 'required|string',
            'city' => 'required|string',
            'code_postale' => 'nullable|numeric'
        ];
    }
}
