<?php

namespace App\Http\Requests\admin\user;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'lastname' => 'required',
            'firstname' => 'required',
            'gender' => 'required|numeric',
            'dob' => 'required|date',
            'file_upload' => 'required|max:10000|mimes:png,jpg',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'username' => 'required|alpha_num',
            'password' => 'required|alpha_num|confirmed',
            'password_confirmation' => 'required|alpha_num',
            'position' => 'required',
            'division' => 'required'
        ];
    }
    public function attributes()
    {
        return [
            'dob' => 'day of birth'
        ];
    }
}
