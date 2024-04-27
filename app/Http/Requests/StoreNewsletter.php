<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreNewsletter extends FormRequest
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
            'key'     => 'required',
            'email'   => 'required|email|max:100|unique:subscribers',
            'my_name' => 'honeypot',
            'my_time' => 'required|honeytime:5'
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'key'   => 'key',
            'email' => 'email'
        ];
    }

    /**
     * @param Validator $validator
     * Created by <Rhiss.net>
     */
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['status' => 'error', 'errors' => $validator->errors()->all()],
            200));
    }
}
