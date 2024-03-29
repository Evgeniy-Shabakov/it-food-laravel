<?php

namespace App\Http\Requests\API\v1\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductStoreRequest extends FormRequest
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
            'title' => [ 'required', 'string', Rule::unique('products')->whereNull('deleted_at') ],
            'category_id' => [ 'required', 'integer', 'exists:categories,id' ],
            'image_file' => [ 'required', 'image', 'max:50' ],
            'description_short' => [ 'string', 'nullable', 'max: 150' ],
            'description_full' => [ 'string', 'nullable', 'max: 1000' ],
            'price_default' => [ 'required', 'decimal: 0,2'],
            'is_active' => [ 'required', 'boolean' ],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Поле "Наименование" обязательно для заполнения',
            'title.string' => 'Поле "Наименование" должно быть строковым значением',
            'title.unique' => 'Такое наименование уже есть в базе данных',
            'image_file.required' => 'Поле "Изображение" обязательно для заполнения',
            'image_file.image' => 'Поле "Изображение" должно быть картинкой',
            'image_file.max' => 'Поле "Изображение" должно быть не более 50 Кбайт',
            'description_short.string' => 'Поле "Короткое описание" должно быть строковым значением',
            'description_short.max' => 'Поле "Короткое описание" должно быть не более 150 символов',
            'description_full.string' => 'Поле "Полное описание" должно быть строковым значением',
            'description_full.max' => 'Поле "Полное описание" должно быть не более 1000 символов',
            'price_default.required' => 'Поле "Цена по умолчанию" обязательно для заполнения',
            'price_default.decimal' => 'Поле "Цена по умолчанию" должно быть числом с двумя знаками после запятой',
            'is_active.required' => 'Поле "Показывать продукт" обязательно для заполнения',
            'is_active.boolean' => 'Поле "Показывать продукт" должно быть либо "да" либо "нет"',
            'category_id.required' => 'Поле "Категория" обязательно для заполнения',
            'category_id.integer' => 'Поле "Категория" должно быть целым числом',
            'category_id.exists' => 'Категория не добавлена в список категорий',
        ];
    }
}
