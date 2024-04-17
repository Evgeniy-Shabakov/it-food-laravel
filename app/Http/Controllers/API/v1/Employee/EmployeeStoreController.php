<?php

namespace App\Http\Controllers\API\v1\Employee;

use App\Http\Controllers\Controller;

use App\Http\Requests\API\v1\Employee\EmployeeStoreRequest;
use App\Http\Resources\API\v1\Employee\EmployeeResource;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class EmployeeStoreController extends Controller
{
    public function __invoke(EmployeeStoreRequest $request)
    {
        $dataEmployee = $request->validated();

        try {
            DB::beginTransaction();

            $dataUser['phone'] = $dataEmployee['phone'];
            $dataUser['password'] = Str::random(16);
            $user = User::firstOrCreate(['phone' => $dataUser['phone']], $dataUser);

            $dataEmployee['user_id'] = $user->id;
            unset($dataEmployee['phone']);
            if(isset($dataEmployee['role_ids']))
            {
                $roleIds = ($dataEmployee['role_ids']);
                unset($dataEmployee['role_ids']);
            }
            $employee = Employee::create($dataEmployee);

            if(isset($roleIds))
            {
                $employee->roles()->attach($roleIds);
            }

            DB::commit();
        }
        catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }

        return new EmployeeResource($employee);
    }
}
