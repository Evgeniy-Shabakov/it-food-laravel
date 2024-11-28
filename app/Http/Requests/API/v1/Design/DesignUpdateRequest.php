<?php

namespace App\Http\Requests\API\v1\Design;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DesignUpdateRequest extends FormRequest
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
            'title' => [ 'required', 'string', Rule::unique('designs')->ignore($this->design) ],
            'is_active' => [ 'required', 'boolean' ],
            'background_page_main_color' => [ 'required', 'string' ],
            'background_page_elements_color' => [ 'required', 'string' ],
            'brand_color' => [ 'required', 'string' ],
            'text_color_main' => [ 'required', 'string' ],
            'text_color_on_brand_color' => [ 'required', 'string' ],
            'text_color_accent' => [ 'required', 'string' ],
            'bottom_nav_color' => [ 'required', 'string' ],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Поле "Наименование" обязательно для заполнения',
            'title.string' => 'Поле "Наименование" должно быть строковым значением',
            'title.unique' => 'Такой Наименование уже есть в базе данных',
        ];
    }
}
