<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Item extends FormRequest
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
            'title' => 'required|string',
            'price' => 'required|string',
            'sub_name' => 'required|string',
            'brand_id' => 'required',
            'color_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'title is required!',
            'price.required' => 'price is required!',
            'sub_name.required' => 'sub_name is required!',
            'brand_id.required' => 'brand id is required!',
            'color_id.required' => 'color id is required!',
        ];
    }
}
