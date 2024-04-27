<?php

namespace App\Http\Requests\API\v1\Employee;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class EmployeeUpdateRequest extends FormRequest
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
            'phone' => ['required', 'string', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', 'max:15',
                function ($attribute, $value, $fail) {
                    $user = User::where('phone', $value)->first();
                    if ($user) {
                        $employee = Employee::where('user_id', $user->id)->first();
                        if ($employee) {
                            if ($employee->id != $this->id) {
                                $fail('Сотрудник с таким номером телефона уже существует.');
                            }
                        }
                    }
                }, ],
            'first_name' => [ 'required', 'string' ],
            'last_name' => [ 'required', 'string' ],
            'surname' => ['string', 'nullable'],
            'job' => ['string', 'nullable'],
            'role_ids' => 'required|array',
            'role_ids.*' => 'nullable|integer|exists:roles,id|director_is_single',
        ];
    }

    public function messages(): array
    {
        return [
            'phone.required' => 'Поле обязательно для заполнения',
            'phone.string' => 'Поле должно быть строковым значением',
            'phone.regex' => 'Номер телефона должен содержать только цифры, пробелы, тире, плюсы и круглые скобки',
            'phone.min' => 'Введено слишком мало символов',
            'phone.max' => 'Введено слишком много символов',
            'first_name.required' => 'Поле обязательно для заполнения',
            'first_name.string' => 'Поле должно быть строковым значением',
            'last_name.required' => 'Поле обязательно для заполнения',
            'last_name.string' => 'Поле должно быть строковым значением',
            'role_ids.required' => 'Необходимо выбрать хотя бы одно разрешение',
            'role_ids.*.director_is_single' => 'Директор уже добавлен',
        ];
    }
}
