<?php

namespace App\Http\Requests\Settings\Notifications;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NotificationsRequest extends FormRequest
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
            'new_admin' => ['nullable', Rule::in(['on'])],
            'new_lead' => ['nullable', Rule::in(['on'])],
            'new_command' => ['nullable', Rule::in(['on'])],
            'command_delivered' => ['nullable', Rule::in(['on'])],
            'new_moderator' => ['nullable', Rule::in(['on'])],
            'new_delivery' => ['nullable', Rule::in(['on'])],
            'time_notify' => ['required', 'numeric', 'between:1,15'],
            'email_to_send' => ['required', 'email']
        ];
    }
}
