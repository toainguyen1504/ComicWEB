<?php

namespace App\Http\Requests\Admin\Comic;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'image' => ' required',  
            'name' => 'required',
            'description' => 'required',
            'author' => 'required',
            'category_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'Please choose image cover!',
            'name.required' => 'Please enter name!',
            'description' => 'Please enter a description!',
            'author' => 'Please enter a author!',
            'category_id' => 'Please choose category!'
        ];
    }
}
