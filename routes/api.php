<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'App\Http\Controllers\API\v1', 'prefix' => 'v1'], function () {
    Route::group(['namespace' => 'Auth'],
        function ()
        {
            Route::get('/send-verify-code', SendVerifyCodeController::class);
            Route::post('/login', LoginController::class);
        }
    );

    Route::group(['namespace' => 'Country'],
        function ()
        {
            Route::get('/countries', IndexController::class);
            Route::get('/countries/{country}', ShowController::class);
            Route::post('/countries', StoreController::class);
            Route::patch('/countries/{country}', UpdateController::class);
            Route::delete('/countries/{country}', DeleteController::class);
        }
    );

    Route::group(['namespace' => 'City'],
        function ()
        {
            Route::get('/cities', IndexController::class);
            Route::get('/cities/{city}', ShowController::class);
            Route::post('/cities', StoreController::class);
            Route::patch('/cities/{city}', UpdateController::class);
            Route::delete('/cities/{city}', DeleteController::class);
        }
    );

    Route::group(['namespace' => 'Restaurant'],
        function ()
        {
            Route::get('/restaurants', IndexController::class);
            Route::get('/restaurants/{restaurant}', ShowController::class);
            Route::post('/restaurants', StoreController::class);
            Route::patch('/restaurants/{restaurant}', UpdateController::class);
            Route::delete('/restaurants/{restaurant}', DeleteController::class);
        }
    );

    Route::group(['namespace' => 'Category'],
        function ()
        {
            Route::get('/categories', IndexController::class);
            Route::get('/categories/{category}', ShowController::class);
            Route::post('/categories', StoreController::class);
            Route::patch('/categories/{category}', UpdateController::class);
            Route::delete('/categories/{category}', DeleteController::class);
        }
    );

    Route::group(['namespace' => 'Company'],
        function ()
        {
            Route::get('/companies/{company}', ShowController::class);
            Route::patch('/companies/{company}', UpdateController::class);
        }
    );

    Route::group(['namespace' => 'Product'],
        function ()
        {
            Route::get('/products', IndexController::class);
            Route::get('/products/{product}', ShowController::class);
            Route::post('/products', StoreController::class);
            Route::patch('/products/{product}', UpdateController::class);
            Route::delete('/products/{product}', DeleteController::class);
        }
    );
});

