<?php

namespace App\Http\Controllers\API\v1\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;

class EmployeeDeleteController extends Controller
{
    public function __invoke(Employee $employee)
    {
        $employee->delete();

        return 'OK';
    }
}
