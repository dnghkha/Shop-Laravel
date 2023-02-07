<?php

namespace App\Http\Requests\web;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'c_fname' => 'required|alpha',
            'c_lname' => 'required|alpha',
            'c_address' => 'required',
            'c_phone' => 'required|numeric',
            'c_email_address' => 'required|email',
            'c2_fname' => 'alpha',
            'c2_lname' => 'alpha',
            'c2_phone' => 'numeric',
            'c2_email_address' => 'email'
        ];
    }
    public function attributes()
    {
        return [
            'c_fname' => 'First Name',
            'c_lname' => 'Last Name',
            'c_address' => 'Address',
            'c_phone' => 'Phone',
            'c_email_address' => 'Email',
            'c2_fname' => 'Ship First Name',
            'c2_lname' => 'Ship Last Name',
            'c2_address' => 'Ship Address',
            'c2_phone' => 'Ship Phone',
            'c2_email_address' => 'Ship Email'
        ];
    }
}
