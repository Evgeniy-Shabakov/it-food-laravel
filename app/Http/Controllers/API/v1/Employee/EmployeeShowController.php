<?php

namespace App\Http\Controllers\API\v1\Employee;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\v1\Employee\EmployeeResource;
use App\Models\Employee;

class EmployeeShowController extends Controller
{
    public function __invoke(Employee $employee)
    {
        return new EmployeeResource($employee);
    }
}
