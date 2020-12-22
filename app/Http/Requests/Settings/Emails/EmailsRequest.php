<?php

namespace App\Http\Requests\Settings\Emails;

use App\Rules\ValidateDomainRule;
use Illuminate\Foundation\Http\FormRequest;

class EmailsRequest extends FormRequest
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
            'from_address' => 'required|email',
            'from_name' => 'required|string',
            'smtp_host' => ['required', new ValidateDomainRule()],
            'smtp_user' => ['required'],
            'smtp_pass' => ['required'],
            'smtp_port' => 'required|integer',
            'smtp_security' => 'required|string',
            'smtp_auth_domain' => 'nullable|string'
        ];
    }
}
