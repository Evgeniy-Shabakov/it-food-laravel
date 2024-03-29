<?php

namespace App\Http\Requests\API\v1\Restaurant;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RestaurantUpdateRequest extends FormRequest
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
            'title' => ['required', 'string', Rule::unique('restaurants')->whereNull('deleted_at')->ignore($this->restaurant)],
            'city_id' => [ 'required', 'integer', 'exists:cities,id' ],
            'street' => [ 'required', 'string' ],
            'house_number' => [ 'required', 'integer', 'min: 1' ],
            'corps_number' => [ 'integer', 'nullable', 'min: 1' ],
            'office_number' => [ 'integer', 'nullable', 'min: 1' ],
            'info' => [ 'string', 'nullable' ],
            'delivery_available' => [ 'required', 'boolean'],
            'pickup_available' => [ 'required', 'boolean'],
            'eating_area_available' => [ 'required', 'boolean'],
            'is_active' => [ 'required', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Поле "Наименование" обязательно для заполнения',
            'title.string' => 'Поле "Наименование" должно быть строковым значением',
            'title.unique' => 'Такое наименование уже есть в базе данных',
            'city_id.required' => 'Поле "Город" обязательно для заполнения',
            'city_id.integer' => 'Поле "Город" должно быть целым числом',
            'city_id.exists' => 'Город не добавлен в список городов',
            'street.required' => 'Поле "Улица" обязательно для заполнения',
            'street.string' => 'Поле "Улица" должно быть строковым значением',
            'house_number.required' => 'Поле "Номер дома" обязательно для заполнения',
            'house_number.integer' => 'Поле "Номер дома" должно быть целым числом',
            'house_number.min' => 'Поле "Номер дома" должно быть положительным числом',
            'corps_number.integer' => 'Поле "Номер корпуса" должно быть целым числом',
            'corps_number.min' => 'Поле "Номер корпуса" должно быть положительным числом',
            'office_number.integer' => 'Поле "Номер офиса" должно быть целым числом',
            'office_number.min' => 'Поле "Номер офиса" должно быть положительным целым числом',
            'info.string' => 'Поле "Информация" должно быть строковым значением',
            'delivery_available.required' => 'Поле "Доступна доставка" обязательно для заполнения',
            'delivery_available.boolean' => 'Поле "Доступна доставка" должно быть либо "да" либо "нет"',
            'pickup_available.required' => 'Поле "Доступен самовывоз" обязательно для заполнения',
            'pickup_available.boolean' => 'Поле "Доступен самовывоз" должно быть либо "да" либо "нет"',
            'eating_area_available.required' => 'Поле "Доступна подача в ресторане" обязательно для заполнения',
            'eating_area_available.boolean' => 'Поле "Доступна подача в ресторане" должно быть либо "да" либо "нет"',
            'is_active.required' => 'Поле "Активировать прием заказов" обязательно для заполнения',
            'is_active.boolean' => 'Поле "Активировать прием заказов" должно быть либо "да" либо "нет"',
        ];
    }
}
