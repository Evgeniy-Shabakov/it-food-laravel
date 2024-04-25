<?php

namespace App\Http\Controllers\API\v1\Employee;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\v1\Employee\EmployeeResource;
use App\Models\Employee;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class EmployeeIndexController extends Controller
{
    public function __invoke()
    {
        if (Auth::user()->employee->isSuperAdmin()) {
            $employees = Employee::all();
        }
        else {
            $superAdminRoleId = Role::where('title', Role::SUPER_ADMIN)->first()->id;

            $employees = Employee::whereNotIn('id', function ($query) use ($superAdminRoleId) {
                $query->select('employee_id')
                    ->from('employee_role')
                    ->where('role_id', $superAdminRoleId);
            })->get();
        }

        return EmployeeResource::collection($employees);
    }
}
