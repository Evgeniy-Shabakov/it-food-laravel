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
        Validator::extend('director_is_single', function ($attribute, $value, $parameters, $validator) {
            $route = Route::getCurrentRoute();
            $employeeId = $route->parameter('employee');
            $employee = $employeeId ? Employee::find($employeeId)->first() : null;

            $roleDirector = Role::where('title', Role::DIRECTOR)->first();

            if ($value == $roleDirector->id) {
                if ($employee) {
                    if ($roleDirector->employees()->count() == 0) return true;
                    if ($employee->isDirector()) return true;
                    else return false;
                } else {
                    if ($roleDirector->employees()->count() == 0) return true;
                    else return false;
                }
            }

            return true;
        });
    }
}
