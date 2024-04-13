<?php

namespace App\Http\Controllers\API\v1\Employee;

use App\Http\Controllers\Controller;

use App\Http\Requests\API\v1\Employee\EmployeeStoreRequest;
use App\Http\Resources\API\v1\Employee\EmployeeResource;
use App\Models\Employee;
use App\Models\User;


class EmployeeStoreController extends Controller
{
    public function __invoke(EmployeeStoreRequest $request)
    {
        $data = $request->validated();

        $employee = Employee::create($data);

        return new EmployeeResource($employee);
    }
}
