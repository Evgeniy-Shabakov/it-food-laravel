<?php

namespace App\Http\Requests\API\v1\Company;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => ['required', 'string'],
            'brand_title' => ['required', 'string'],
            'tagline' => ['nullable', 'string'],
            'favicon_file' => ['required', 'file'],
            'logo_file' => ['required', 'file'],
            'about_us' => ['nullable', 'text'],
            'contacts' => ['nullable', 'text'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Поле "Наименование" обязательно для заполнения',
            'title.string' => 'Поле "Наименование" должно быть строковым значением',
            'brand_title.required' => 'Поле "Брэнд" должно быть строковым значением',
            'brand_title.string' => 'Поле "Брэнд" должно быть строковым значением',
            'tagline.string' => 'Поле "Слоган" должно быть строковым значением',
            'favicon_file.required' => 'Поле "Иконка сайта" обязательно для заполнения',
            'favicon_file.file' => 'Поле "Иконка сайта" должно быть файлом',
            'logo_file.required' => 'Поле "Логотип" обязательно для заполнения',
            'logo_file.file' => 'Поле "Логотип" должно быть файлом',
            'about_us.text' => 'Поле "О нас" должно быть текстовым значением',
            'contacts.text' => 'Поле "Контакты" должно быть текстовым значением',
        ];
    }
}
