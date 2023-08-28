<?php

namespace UserModule\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'username' => ['min:4',Rule::unique('users')->ignore($this->id, 'id')],
            'email' => ['email', 'max:255',Rule::unique('users')->ignore($this->id, 'id')],
            'first_name'=>'min:3|max:15',
            'last_name'=>'min:3|max:15',
            'is_admin' => 'between:0,1',
            'is_active' => 'between:0,1',
        ];
    }
}
