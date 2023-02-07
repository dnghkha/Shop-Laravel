<?php

namespace App\Http\Requests\admin\product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'sku' => 'required',
            'price' => 'required|numeric',
            'qty' => 'required|numeric',
            'supplier_id' => 'required|numeric',
            'category_id' => 'required|numeric',
            'alias' => 'required',
            'summary' => 'required',
            'content' => 'required',
            'file_upload' => 'max:10000|mimes:png,jpg'
        ];
    }

    public function attributes()
    {
        return [
            'qty' => 'quantity'
        ];
    }
}
