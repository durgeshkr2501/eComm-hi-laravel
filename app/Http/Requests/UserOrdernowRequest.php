<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserOrdernowRequest extends FormRequest
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
            'address' => 'required',
            'payment' => 'required',

           ];
    }

    public function messages()
    {
        return [
            'address.required' => 'Please enter your shipping address',
            'payment.required' => 'please choose your payment option'

        ];
    }
}
