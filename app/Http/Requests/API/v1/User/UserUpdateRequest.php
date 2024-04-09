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
            'phone' => ['required', 'string', Rule::unique('users')->whereNull('deleted_at')->ignore($this->user)],
        ];
    }

    public function messages(): array
    {
        return [
            'phone.required' => 'Поле обязательно для заполнения',
            'phone.string' => 'Поле должно быть строковым значением',
            'phone.unique' => 'Такая категория уже есть в базе данных',
        ];
    }
}
