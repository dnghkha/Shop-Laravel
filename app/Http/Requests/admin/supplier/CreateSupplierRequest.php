<?php

namespace App\Http\Requests\admin\supplier;

use Illuminate\Foundation\Http\FormRequest;

class CreateSupplierRequest extends FormRequest
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
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'alias' => 'required',
            'summary' => 'required',
            'description' => 'required',
            'file_upload' => 'required|max:10000|mimes:png,jpg'
        ];
    }
}
