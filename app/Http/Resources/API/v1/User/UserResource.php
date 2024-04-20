<?php

namespace App\Http\Resources\API\v1\User;

use App\Http\Resources\API\v1\Employee\EmployeeResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'phone' => $this->phone,
            'employee' => $this->whenLoaded('employee', function () {
                return [
                    'first_name' => $this->employee->first_name,
                    'last_name' => $this->employee->last_name,
                    'surname' => $this->employee->surname,
                ];
            }),
//            'employee_first_name' => $this->employee->first_name,
//            'employee_last_name' => $this->employee->last_name,
//            'employee_surname' => $this->employee->surname,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
