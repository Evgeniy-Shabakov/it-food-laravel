<?php

namespace App\Http\Requests\API\v1\Order;

use App\Service\OrderType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrderStoreRequest extends FormRequest
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
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'city_id' => ['required', 'integer', 'exists:cities,id'],
            'restaurant_id' => [
                'required_if:order_type,' . OrderType::PICK_UP,
                'required_if:order_type,' . OrderType::IN_RESTAURANT,
                'nullable', 'integer', 'exists:restaurants,id'],
            'user_address_id' => [
                'required_if:order_type,' . OrderType::DELIVERY,
                'nullable', 'integer', 'exists:addresses,id'],
            'order_type' => ['required', 'string'],
            'table_number' => ['nullable', 'integer'],
            'car_number' => ['nullable', 'string'],
            'pack_takeaway' => ['nullable', 'boolean'],
            'total_products_price' => ['required', 'decimal: 0,2'],
            'delivery_price' => ['required', 'decimal: 0,2'],
            'total_price' => ['required', 'decimal: 0,2'],
            'payment_type' => ['required', 'string'],
            'banknote_for_change' => ['nullable', 'decimal: 0,2'],
            'is_payment' => ['required', 'boolean'],
            'comment' => ['nullable', 'string'],
            'products_in_order' => ['required', 'array', 'min:1'],
            'products_in_order.*.id' => ['required', 'integer', 'exists:products,id'],
            'products_in_order.*.countInCart' => ['required', 'integer', 'min:1'],
            'products_in_order.*.price_default' => ['required', 'decimal: 0,2'],
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'Поле "user_id" обязательно для заполнения',
            'user_id.integer' => 'Поле "user_id" должно быть целым числом',
            'user_id.exists' => 'Поле "user_id" должно содержаться в таблице "users"',
            'city_id.required' => 'Поле "city_id" обязательно для заполнения',
            'city_id.integer' => 'Поле "city_id" должно быть целым числом',
            'city_id.exists' => 'Поле "city_id" должно содержаться в таблице "cities"',
            'restaurant_id.integer' => 'Поле "restaurant_id" должно быть целым числом',
            'restaurant_id.exists' => 'Поле "restaurant_id" должно содержаться в таблице "restaurants"',
            'user_address_id.integer' => 'Необходимо добавить или выбрать адрес',
            'user_address_id.exists' => 'Необходимо добавить или выбрать адрес',
        ];
    }
}
