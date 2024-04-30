<?php

namespace App\Http\Requests\API\v1\City;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CityStoreRequest extends FormRequest
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
                Rule::unique('cities')],

            'country_id' => [
                'required',
                'integer',
                'exists:countries,id'],
            'min_order_value_for_delivery' => 'numeric|min:0|max:999999',
            'delivery_price' => 'numeric|min:0|max:999999',
            'order_value_for_free_delivery' => 'numeric|min:0|max:999999',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Поле "город" обязательно для заполнения',
            'title.string' => 'Поле "город" должно быть строковым значением',
            'title.unique' => 'Такой город уже есть в базе данных',
            'country_id.required' => 'Поле "страна" обязательно для заполнения',
            'country_id.integer' => 'Поле "страна" должно быть целым числом',
            'country_id.exists' => 'Страна не добавлена в список стран',
            'min_order_value_for_delivery.numeric' => 'Поле должно быть числом',
            'min_order_value_for_delivery.min' => 'Поле должно быть больше или равно 0',
            'min_order_value_for_delivery.max' => 'Поле должно быть меньше 999999',
            'delivery_price.numeric' => 'Поле должно быть числом',
            'delivery_price.min' => 'Поле должно быть больше или равно 0',
            'delivery_price.max' => 'Поле должно быть меньше 999999',
            'order_value_for_free_delivery.numeric' => 'Поле должно быть числом',
            'order_value_for_free_delivery.min' => 'Поле должно быть больше или равно 0',
            'order_value_for_free_delivery.max' => 'Поле должно быть меньше 999999',
        ];
    }
}
