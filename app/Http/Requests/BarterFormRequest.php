<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BarterFormRequest extends FormRequest
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
            
            'name' => [
                
                'string'
            ],
            'description' => [
                
                'string'
            ],

            'image' => [
                'nullable',
                // 'image|mimes:jpeg,png,jpg'
            ],

            'category_id' => [
                
                'integer'
            ],
            
            'quantity' => [
                
                'integer'
            ],
            'condition' => [
                
                'string'
            ],

            
            

            //
        ];
    }
}
