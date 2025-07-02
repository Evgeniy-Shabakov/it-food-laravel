<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\v1\Auth\LoginController;
use App\Http\Controllers\API\v1\Auth\LogoutController;
use App\Http\Controllers\API\v1\Auth\SendVerifyCodeController;
use App\Http\Controllers\API\v1\Auth\SendVerifyCodeForEmployeeController;
use App\Http\Controllers\API\v1\Auth\VK\VKLoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//роуты для аутентификации расположены в web.php т.к. к ним автоматически применяется CSRF защита

Route::middleware('guest')->group(function (){
    Route::post('/send-verify-code', SendVerifyCodeController::class);
    Route::post('/send-verify-code-for-employee', SendVerifyCodeForEmployeeController::class);
    Route::post('/login', LoginController::class);
    Route::post('/vk-login', VKLoginController::class);
});

Route::middleware('auth')->group(function (){
    Route::delete('/logout', LogoutController::class);
});




