<?php

namespace App\Http\Requests\API\v1\Employee;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeStoreRequest extends FormRequest
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
            'phone' => ['required', 'string'],
            'first_name' => [ 'required', 'string' ],
            'last_name' => [ 'required', 'string' ],
            'surname' => ['string'],
            'job' => ['string'],
        ];
    }

    public function messages(): array
    {
        return [
            'phone.required' => 'Поле обязательно для заполнения',
            'phone.string' => 'Поле должно быть строковым значением',
            'phone.unique' => 'Такой телефон уже есть в базе данных',
        ];
    }
}
