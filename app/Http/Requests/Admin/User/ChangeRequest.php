<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class ChangeRequest extends FormRequest
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
            'oldpass' => 'required|min:8',
            'password' => 'required|confirmed|min:8'
        ];
    }

    public function messages()
    {
        return [
            'oldpass.required' => 'Please enter a Old pasword!',
            'oldpass.min' => 'Old pasword must be at least 8 characters!',

            'password.required' => 'Please enter a new password!',
            'password.min' => 'New password must be at least 8 characters!',

            'newpass.confirmed' => 'Incorrect confirm new password!'
        ];
    }
}
