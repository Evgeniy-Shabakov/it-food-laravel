<?php

namespace App\Http\Requests\API\v1\Company;

use Illuminate\Foundation\Http\FormRequest;

class CompanyUpdateRequest extends FormRequest
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
            'favicon_file' => [ 'image', 'mimes:png', 'max:30', 'dimensions:width=96,height=96' ],
            'logo_file' => ['image', 'max:100'],
            'phone' => ['nullable', 'string', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', 'max:15'],
            'open_time' => ['nullable', 'date_format:H:i'],
            'close_time' => ['nullable', 'date_format:H:i'],
            'about_us' => ['string', 'nullable'],
            'contacts' => ['string', 'nullable'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Поле "Наименование" обязательно для заполнения',
            'title.string' => 'Поле "Наименование" должно быть строковым значением',
            'brand_title.required' => 'Поле "Брэнд" обязательно для заполнения',
            'brand_title.string' => 'Поле "Брэнд" должно быть строковым значением',
            'tagline.string' => 'Поле "Слоган" должно быть строковым значением',
            'favicon_file.image' => 'Поле "Иконка сайта" должно быть картинкой',
            'favicon_file.mimes' => 'Поле "Иконка сайта" должно быть в формате png',
            'favicon_file.max' => 'Поле "Иконка сайта" должно быть не более 30 Кбайт',
            'favicon_file.dimensions' => 'Поле "Иконка сайта" должно быть 96 на 96 пикселей',
            'logo_file.image' => 'Поле "Логотип" должно быть картинкой',
            'logo_file.max' => 'Поле "Логотип" должно быть не более 100 Кбайт',
            'phone.string' => 'Поле должно быть строковым значением',
            'phone.regex' => 'Номер телефона должен содержать только цифры, пробелы, тире, плюсы и круглые скобки',
            'phone.min' => 'Введено слишком мало символов',
            'phone.max' => 'Введено слишком много символов',
            'open_time.date_format' => 'Неверный формат данных',
            'close_time.date_format' => 'Неверный формат данных',
            'about_us.string' => 'Поле "О нас" должно быть строковым значением',
            'contacts.string' => 'Поле "Контакты" должно быть строковым значением',
        ];
    }
}
