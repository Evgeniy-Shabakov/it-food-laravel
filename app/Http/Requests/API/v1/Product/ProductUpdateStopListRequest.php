<?php

namespace App\Http\Requests\API\v1\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductUpdateStopListRequest extends FormRequest
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
            'stop_list' => [ 'required', 'boolean' ],
        ];
    }

    public function messages(): array
    {
        return [
            'stop_list.required' => 'Поле "Стоп лист" обязательно для заполнения',
            'stop_list.boolean' => 'Поле "Стоп лист" должно быть либо "да" либо "нет"',
        ];
    }
}
