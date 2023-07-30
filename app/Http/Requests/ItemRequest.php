<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ItemRequest extends FormRequest
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
            'image' => 'required|mimes:jpeg,png,jpg |max:4096',
            'is_active' => 'between:0,1',
            'brand_id'=> 'exists:brands,id',
            'name' => [
                'required',
                Rule::unique('items')->where(function ($query) {
                    return $query->where('brand_id', $this->brand_id);
                })
            ],
        ];
    }
}
