<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
            'category_id' => [
                'required',
                'integer'
            ],
            'name' => [
                'required',
                'string'
            ],
            'description' => [
                'required',
                'string'
            ],
            'tags' => [
                'required',
                'array'
            ],
            'tags.*' => [
                'required',
                'string',
                'max:255'
            ],
            'quantity' => [
                'required',
                'integer'
            ],
            'condition' => [
                'required',
                'string'
            ],
            'request' => [
                'required',
                'string'
            ],
            'image' => [
                'nullable',
                // 'image|mimes:jpeg,png,jpg'
            ],
            

            //
        ];
    }
}
