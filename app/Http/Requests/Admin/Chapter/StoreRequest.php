<?php

namespace App\Http\Requests\Admin\Chapter;

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
            'chapter_name' => 'required|max:50'
            // :chapter,chapter_name
        ];
    }

    public function messages()
    {
        return [
            'chapter_name.required' => 'Please enter name!',
            'chapter_name.max' => 'Please enter your name up to 50 characters!'
        ];
    }
}
