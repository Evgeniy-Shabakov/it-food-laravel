<?php

namespace App\Http\Requests\API\v1\LegalDocument;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LegalDocumentStoreRequest extends FormRequest
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
            'title' => ['required', 'string', Rule::unique('legal_documents')],
            'file' => ['required', 'file', 'mimes:docx', 'max:1000'],
            'description' => ['string', 'nullable', 'max: 1000'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Поле "Наименование" обязательно для заполнения',
            'title.string' => 'Поле "Наименование" должно быть строковым значением',
            'title.unique' => 'Такое наименование уже есть в базе данных',
            'file.required' => 'Поле "Изображение" обязательно для заполнения',
            'file.file' => 'Поле "Файл" должно быть файлом',
            'file.mimes' => 'Файл должен быть в формате docx',
            'file.max' => 'Поле "Изображение" должно быть не более 1 Mb',
            'description.string' => 'Поле "Описание" должно быть строковым значением',
            'description.max' => 'Поле "Описание" должно быть не более 1000 символов',
        ];
    }
}
