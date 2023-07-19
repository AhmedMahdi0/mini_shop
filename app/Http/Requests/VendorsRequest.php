<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendorsRequest extends FormRequest
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
            'first_name'=>'min:3|max:15',
            'last_name'=>'min:3|max:15',
            'email' => 'required|unique:users|email',
            'phone' => 'min:10|max:10',
            'is_active' => 'between:0,1',
        ];
    }
}
