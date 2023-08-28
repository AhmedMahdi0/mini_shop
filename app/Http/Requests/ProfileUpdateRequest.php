<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Modules\UserModule\app\Models\User;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'username' => ['min:4', Rule::unique(User::class)->ignore($this->user()->id)],
            'first_name'=>'min:3|max:15',
            'last_name'=>'min:3|max:15',
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],

            // 'email' => 'unique:users|email',
            // 'name' => ['string', 'max:255'],
        ];
    }
}
