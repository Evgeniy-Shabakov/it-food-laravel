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
            'title' => ['required', 'string', Rule::unique('restaurants')->ignore($this->restaurant)],
            'city_id' => [ 'required', 'integer', 'exists:cities,id' ],
            'street' => [ 'required', 'string' ],
            'house_number' => [ 'required', 'integer', 'min: 1' ],
            'corps_number' => [ 'integer', 'nullable', 'min: 1' ],
            'office_number' => [ 'integer', 'nullable', 'min: 1' ],
            'info' => [ 'string', 'nullable' ],
            'pick_up_available' => [ 'required', 'boolean'],
            'delivery_available' => [ 'required', 'boolean'],
            'pick_up_available_at_the_restaurant_counter' => [ 'required', 'boolean'],
            'delivery_available_at_the_restaurant_to_the_table' => [ 'required', 'boolean'],
            'pick_up_available_at_the_car_window' => [ 'required', 'boolean'],
            'delivery_available_in_the_parking_to_car' => [ 'required', 'boolean'],
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
            'pick_up_available.required' => 'Поле "Доступен самовывоз" обязательно для заполнения',
            'pick_up_available.boolean' => 'Поле "Доступен самовывоз" должно быть либо "да" либо "нет"',
            'delivery_available.required' => 'Поле "Доступна доставка" обязательно для заполнения',
            'delivery_available.boolean' => 'Поле "Доступна доставка" должно быть либо "да" либо "нет"',
            'pick_up_available_at_the_restaurant_counter.required' => 'Поле "Доступна выдача в ресторане на прилавке" обязательно для заполнения',
            'pick_up_available_at_the_restaurant_counter.boolean' => 'Поле "Доступна выдача в ресторане на прилавке" должно быть либо "да" либо "нет"',
            'delivery_available_at_the_restaurant_to_the_table.required' => 'Поле "Доступна подача в ресторане к столику" обязательно для заполнения',
            'delivery_available_at_the_restaurant_to_the_table.boolean' => 'Поле "Доступна подача в ресторане к столику" должно быть либо "да" либо "нет"',
            'pick_up_available_at_the_car_window.required' => 'Поле "Доступна выдача в окне для автомобилей" обязательно для заполнения',
            'pick_up_available_at_the_car_window.boolean' => 'Поле "Доступна выдача в окне для автомобилей" должно быть либо "да" либо "нет"',
            'delivery_available_in_the_parking_to_car.required' => 'Поле "Доступна подача к машине на парковке" обязательно для заполнения',
            'delivery_available_in_the_parking_to_car.boolean' => 'Поле "Доступна подача к машине на парковке" должно быть либо "да" либо "нет"',
            'is_active.required' => 'Поле "Активировать прием заказов" обязательно для заполнения',
            'is_active.boolean' => 'Поле "Активировать прием заказов" должно быть либо "да" либо "нет"',
        ];
    }
}
