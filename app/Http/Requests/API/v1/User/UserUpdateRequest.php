<?php

namespace App\Http\Requests\API\v1\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
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
//            'phone' => ['required', 'string', Rule::unique('users')->ignore($this->user)],
            'name' => ['required', 'string', 'max:50'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Поле обязательно для заполнения',
            'name.string' => 'Поле должно быть строковым значением',
            'name.max' => 'Максимальное количество символов - 50',
        ];
    }
}
