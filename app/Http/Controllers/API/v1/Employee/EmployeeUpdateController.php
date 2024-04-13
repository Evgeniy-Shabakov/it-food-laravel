<?php

namespace App\Http\Controllers\API\v1\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\v1\Employee\EmployeeUpdateRequest;
use App\Http\Resources\API\v1\Employee\EmployeeResource;
use App\Models\Employee;

class EmployeeUpdateController extends Controller
{
    public function __invoke(EmployeeUpdateRequest $request, Employee $employee)
    {
        $data = $request->validated();

        $employee->update($data);

        return new EmployeeResource($employee);
    }
}
