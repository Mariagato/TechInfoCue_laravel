<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContact extends FormRequest
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
            'name'         => 'regex:/^[a-zA-Z\s]+$/u|required|min:3|max:200',
            'email'        => 'required|email|max:100',
            'phone'        => 'required|max:100',
            'city'         => 'sometimes|max:100',
            'message_form' => 'required',
            'my_name'      => 'honeypot',
            'my_time'      => 'required|honeytime:5',
            //'g-recaptcha-response' => 'recaptcha',
        ];
    }
}
