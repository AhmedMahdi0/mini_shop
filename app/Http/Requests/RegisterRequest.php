<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'password' => ['required','min:7'],
            'email' => ['required','unique:users','email'],
            'username' => ['required','min:4','unique:users,username'],
            'first_name' => ['min:3','max:15'],
            'last_name' => ['min:3','max:15'],
        ];
    }
}
