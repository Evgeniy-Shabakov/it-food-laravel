<?php

namespace App\Http\Controllers\API\v1\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class EmployeeDeleteController extends Controller
{
    public function __invoke(Employee $employee)
    {
        try {
            DB::beginTransaction();

            $employee->user->roles()->detach();
            $employee->delete();

            DB::commit();
        }
        catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }

        return 'OK';
    }
}
