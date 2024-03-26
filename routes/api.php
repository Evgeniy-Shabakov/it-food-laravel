<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\v1\Auth\LoginController;
use App\Http\Controllers\API\v1\Auth\LogoutController;
use App\Http\Controllers\API\v1\Auth\SendVerifyCodeController;

use App\Http\Controllers\API\v1\Country\CountryDeleteController;
use App\Http\Controllers\API\v1\Country\CountryIndexController;
use App\Http\Controllers\API\v1\Country\CountryShowController;
use App\Http\Controllers\API\v1\Country\CountryStoreController;
use App\Http\Controllers\API\v1\Country\CountryUpdateController;

use App\Http\Controllers\API\v1\City\CityDeleteController;
use App\Http\Controllers\API\v1\City\CityIndexController;
use App\Http\Controllers\API\v1\City\CityShowController;
use App\Http\Controllers\API\v1\City\CityStoreController;
use App\Http\Controllers\API\v1\City\CityUpdateController;

use App\Http\Controllers\API\v1\Restaurant\RestaurantDeleteController;
use App\Http\Controllers\API\v1\Restaurant\RestaurantIndexController;
use App\Http\Controllers\API\v1\Restaurant\RestaurantShowController;
use App\Http\Controllers\API\v1\Restaurant\RestaurantStoreController;
use App\Http\Controllers\API\v1\Restaurant\RestaurantUpdateController;

use App\Http\Controllers\API\v1\Category\CategoryDeleteController;
use App\Http\Controllers\API\v1\Category\CategoryIndexController;
use App\Http\Controllers\API\v1\Category\CategoryShowController;
use App\Http\Controllers\API\v1\Category\CategoryStoreController;
use App\Http\Controllers\API\v1\Category\CategoryUpdateController;

use App\Http\Controllers\API\v1\Company\CompanyShowController;
use App\Http\Controllers\API\v1\Company\CompanyUpdateController;

use App\Http\Controllers\API\v1\Product\ProductDeleteController;
use App\Http\Controllers\API\v1\Product\ProductIndexController;
use App\Http\Controllers\API\v1\Product\ProductShowController;
use App\Http\Controllers\API\v1\Product\ProductStoreController;
use App\Http\Controllers\API\v1\Product\ProductUpdateController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function () {

    Route::get('/send-verify-code', SendVerifyCodeController::class);
    Route::post('/login', LoginController::class);

    Route::middleware('auth:sanctum')->group(function () {
        Route::delete('/logout', LogoutController::class);
    });


    Route::get('/countries', CountryIndexController::class);
    Route::get('/countries/{country}', CountryShowController::class);

    Route::middleware(['auth:sanctum', 'ability:super-admin,director,administrator'])->group(function () {
        Route::post('/countries', CountryStoreController::class);
        Route::patch('/countries/{country}', CountryUpdateController::class);
        Route::delete('/countries/{country}', CountryDeleteController::class);
    });

    Route::get('/cities', CityIndexController::class);
    Route::get('/cities/{city}', CityShowController::class);
    Route::post('/cities', CityStoreController::class);
    Route::patch('/cities/{city}', CityUpdateController::class);
    Route::delete('/cities/{city}', CityDeleteController::class);

    Route::get('/restaurants', RestaurantIndexController::class);
    Route::get('/restaurants/{restaurant}', RestaurantShowController::class);
    Route::post('/restaurants', RestaurantStoreController::class);
    Route::patch('/restaurants/{restaurant}', RestaurantUpdateController::class);
    Route::delete('/restaurants/{restaurant}', RestaurantDeleteController::class);

    Route::get('/categories', CategoryIndexController::class);
    Route::get('/categories/{category}', CategoryShowController::class);
    Route::post('/categories', CategoryStoreController::class);
    Route::patch('/categories/{category}', CategoryUpdateController::class);
    Route::delete('/categories/{category}', CategoryDeleteController::class);

    Route::get('/companies/{company}', CompanyShowController::class);
    Route::patch('/companies/{company}', CompanyUpdateController::class);

    Route::get('/products', ProductIndexController::class);
    Route::get('/products/{product}', ProductShowController::class);
    Route::post('/products', ProductStoreController::class);
    Route::patch('/products/{product}', ProductUpdateController::class);
    Route::delete('/products/{product}', ProductDeleteController::class);

});

