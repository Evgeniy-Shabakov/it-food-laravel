<?php

namespace App\Providers;

use App\Models\Employee;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Validator::extend('role_id_not_super_admin', function ($attribute, $value, $parameters, $validator) {
            $route = Route::getCurrentRoute();
            $employeeId = $route->parameter('employee');
            $employee = $employeeId ? Employee::find($employeeId)->first() : null;

            $roleSuperAdmin = Role::where('title', Role::SUPER_ADMIN)->first();

            if ($value == $roleSuperAdmin->id){
                if ($employee) {
                    if($employee->isSuperAdmin() == false)
                        return false;
                }
                else return false;
            }

            return true;
        });

        Validator::extend('role_id_not_director', function ($attribute, $value, $parameters, $validator) {
            $route = Route::getCurrentRoute();
            $employeeId = $route->parameter('employee');
            $employee = $employeeId ? Employee::find($employeeId)->first() : null;

            $roleDirector = Role::where('title', Role::DIRECTOR)->first();

            if ($value == $roleDirector->id){
                if ($employee) {
                    if($employee->isDirector() == false)
                        return false;
                }
                else if ($roleDirector->employees()->count() > 0)
                    return false;
                else if (Auth::user()->employee->isSuperAdmin())
                    return true;
            }

            return true;
        });
    }
}
