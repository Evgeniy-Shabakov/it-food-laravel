<?php

namespace App\Http\Requests\API\v1\Ingredient;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class IngredientUpdateRequest extends FormRequest
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
            'title' => [ 'required', 'string', Rule::unique('ingredients')->ignore($this->ingredient) ],
            'image_file' => [ 'image', 'max:50' ],
            'description' => [ 'string', 'nullable', 'max: 300' ],
            'price_default' => [ 'required', 'decimal:0,2'],
            'is_active' => [ 'required', 'boolean' ],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Поле "Наименование" обязательно для заполнения',
            'title.string' => 'Поле "Наименование" должно быть строковым значением',
            'title.unique' => 'Такое наименование уже есть в базе данных',
            'image_file.image' => 'Поле "Картинка" должно быть картинкой',
            'image_file.max' => 'Поле "Картинка" должно быть не более 50 Кбайт',
            'description.string' => 'Поле "Описание" должно быть строковым значением',
            'description.max' => 'Поле "Описание" должно быть не более 300 символов',
            'price_default.required' => 'Поле "Цена по умолчанию" обязательно для заполнения',
            'price_default.decimal' => 'Поле "Цена по умолчанию" должно быть числом с двумя знаками после запятой',
            'is_active.required' => 'Поле "Показывать продукт" обязательно для заполнения',
            'is_active.boolean' => 'Поле "Показывать продукт" должно быть либо "да" либо "нет"',
        ];
    }
}
