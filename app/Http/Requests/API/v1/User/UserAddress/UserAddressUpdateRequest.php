<?php

namespace App\Http\Requests\API\v1\User\UserAddress;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserAddressUpdateRequest extends FormRequest
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
            'title' => ['string', 'max:50', 'nullable'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'city_id' => ['required', 'integer', 'exists:cities,id'],
            'street' => ['required', 'string', 'max:255'],
            'house_number' => ['required', 'string', 'max:10'],
            'corps_number' => ['string', 'max:10', 'nullable'],
            'apartment_number' => ['string', 'max:10', 'nullable'],
            'entrance_number' => ['integer', 'min:0', 'max:255', 'nullable'],
            'floor' => ['integer', 'min:0', 'max:255', 'nullable'],
            'entrance_code' => ['string', 'max:20', 'nullable'],
            'comment' => ['string', 'max:500', 'nullable'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.string' => 'Поле должно быть строковым значением',
            'title.max' => 'Максимальное число символов - 50',
            'user_id.required' => 'Поле обязательно для заполнения',
            'user_id.integer' => 'Поле должно быть целым числом',
            'user_id.exists' => 'Пользователя нет в базе данных',
            'city_id.required' => 'Поле обязательно для заполнения',
            'city_id.integer' => 'Поле должно быть целым числом',
            'city_id.exists' => 'Города нет в базе данных',
            'street.required' => 'Поле обязательно для заполнения',
            'street.string' => 'Поле должно быть строковым значением',
            'street.max' => 'Максимальное число символов - 255',
            'house_number.required' => 'Поле обязательно для заполнения',
            'house_number.string' => 'Поле должно быть строковым значением',
            'house_number.max' => 'Максимальное число символов - 10',
            'corps_number.string' => 'Поле должно быть строковым значением',
            'corps_number.max' => 'Максимальное число символов - 10',
            'apartment_number.string' => 'Поле должно быть строковым значением',
            'apartment_number.max' => 'Максимальное число символов - 10',
            'entrance_number.integer' => 'Поле должно быть целым числом',
            'entrance_number.min' => 'Минимальное значение - 0',
            'entrance_number.max' => 'Максимальное значение - 255',
            'floor.integer' => 'Поле должно быть целым числом',
            'floor.min' => 'Минимальное значение - 0',
            'floor.max' => 'Максимальное значение - 255',
            'entrance_code.string' => 'Поле должно быть строковым значением',
            'entrance_code.max' => 'Максимальное число символов - 20',
            'comment.string' => 'Поле должно быть строковым значением',
            'comment.max' => 'Максимальное число символов - 500',
        ];
    }
}
