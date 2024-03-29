<?php

namespace App\Http\Requests\API\v1\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryUpdateRequest extends FormRequest
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
            'title' => ['required', 'string', Rule::unique('categories')->whereNull('deleted_at')->ignore($this->category)],
            'number_in_list' => ['integer'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Поле обязательно для заполнения',
            'title.string' => 'Поле должно быть строковым значением',
            'title.unique' => 'Такая категория уже есть в базе данных',
            'number_in_list.integer' => 'Поле должно быть целым числом',
        ];
    }
}
