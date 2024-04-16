<?php

namespace App\Http\Requests\API\v1\Country;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CountryStoreRequest extends FormRequest
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
            'title' => [
                'required',
                'string',
                Rule::unique('countries')
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Поле обязательно для заполнения',
            'title.string' => 'Поле должно быть строковым значением',
            'title.unique' => 'Такая страна уже есть в базе данных',
        ];
    }
}
