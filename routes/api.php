<?php

use App\Http\Controllers\API\v1\User\UserDeleteController;
use App\Http\Controllers\API\v1\User\UserIndexController;
use App\Http\Controllers\API\v1\User\UserShowController;
use App\Http\Controllers\API\v1\User\UserStoreController;
use App\Http\Controllers\API\v1\User\UserUpdateController;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Product;
use App\Models\Restaurant;

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

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function () {

    Route::get('/employees', UserIndexController::class);
    Route::get('/employees/{user}', UserShowController::class);

    Route::post('/employees', UserStoreController::class);
    Route::patch('/employees/{user}', UserUpdateController::class);
    Route::delete('/employees/{user}', UserDeleteController::class);


    Route::get('/countries', CountryIndexController::class);
    Route::get('/countries/{country}', CountryShowController::class);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/countries', CountryStoreController::class)->can('create', Country::class);
        Route::patch('/countries/{country}', CountryUpdateController::class)->can('update', 'country');
        Route::delete('/countries/{country}', CountryDeleteController::class)->can('delete', 'country');
    });


    Route::get('/cities', CityIndexController::class);
    Route::get('/cities/{city}', CityShowController::class);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/cities', CityStoreController::class)->can('create', City::class);
        Route::patch('/cities/{city}', CityUpdateController::class)->can('update', 'city');
        Route::delete('/cities/{city}', CityDeleteController::class)->can('delete', 'city');
    });


    Route::get('/restaurants', RestaurantIndexController::class);
    Route::get('/restaurants/{restaurant}', RestaurantShowController::class);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/restaurants', RestaurantStoreController::class)->can('create', Restaurant::class);
        Route::patch('/restaurants/{restaurant}', RestaurantUpdateController::class)->can('update', 'restaurant');
        Route::delete('/restaurants/{restaurant}', RestaurantDeleteController::class)->can('delete', 'restaurant');
    });


    Route::get('/companies/{company}', CompanyShowController::class);

    Route::middleware('auth:sanctum')->group(function () {
        Route::patch('/companies/{company}', CompanyUpdateController::class)->can('update', 'company');
    });


    Route::get('/categories', CategoryIndexController::class);
    Route::get('/categories/{category}', CategoryShowController::class);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/categories', CategoryStoreController::class)->can('create', Category::class);
        Route::patch('/categories/{category}', CategoryUpdateController::class)->can('update', 'category');
        Route::delete('/categories/{category}', CategoryDeleteController::class)->can('delete', 'category');
    });


    Route::get('/products', ProductIndexController::class);
    Route::get('/products/{product}', ProductShowController::class);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/products', ProductStoreController::class)->can('create', Product::class);
        Route::patch('/products/{product}', ProductUpdateController::class)->can('update', 'product');
        Route::delete('/products/{product}', ProductDeleteController::class)->can('delete', 'product');
    });

});

