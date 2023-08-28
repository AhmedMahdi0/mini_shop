<?php

namespace UserModule\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'username'=> 'required|min:4|unique:users,username',
            'first_name'=>'min:3|max:15',
            'last_name'=>'min:3|max:15',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:7|confirmed',
            'password_confirmation' => 'required ',
            'is_admin' => 'between:0,1',
            'is_active' => 'between:0,1',
        ];
    }
}
