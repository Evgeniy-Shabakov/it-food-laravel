<?php

use App\Http\Controllers\API\v1\Auth\GetAuthUserController;
use App\Http\Controllers\API\v1\Category\CategoryDeleteController;
use App\Http\Controllers\API\v1\Category\CategoryIndexController;
use App\Http\Controllers\API\v1\Category\CategoryShowController;
use App\Http\Controllers\API\v1\Category\CategoryStoreController;
use App\Http\Controllers\API\v1\Category\CategoryUpdateController;
use App\Http\Controllers\API\v1\City\CityDeleteController;
use App\Http\Controllers\API\v1\City\CityIndexController;
use App\Http\Controllers\API\v1\City\CityShowController;
use App\Http\Controllers\API\v1\City\CityStoreController;
use App\Http\Controllers\API\v1\City\CityUpdateController;
use App\Http\Controllers\API\v1\Company\CompanyShowController;
use App\Http\Controllers\API\v1\Company\CompanyUpdateController;
use App\Http\Controllers\API\v1\Country\CountryDeleteController;
use App\Http\Controllers\API\v1\Country\CountryIndexController;
use App\Http\Controllers\API\v1\Country\CountryShowController;
use App\Http\Controllers\API\v1\Country\CountryStoreController;
use App\Http\Controllers\API\v1\Country\CountryUpdateController;
use App\Http\Controllers\API\v1\Design\DesignDeleteController;
use App\Http\Controllers\API\v1\Design\DesignIndexController;
use App\Http\Controllers\API\v1\Design\DesignShowController;
use App\Http\Controllers\API\v1\Design\DesignStoreController;
use App\Http\Controllers\API\v1\Design\DesignUpdateController;
use App\Http\Controllers\API\v1\Design\GetActiveDesignController;
use App\Http\Controllers\API\v1\Employee\EmployeeDeleteController;
use App\Http\Controllers\API\v1\Employee\EmployeeIndexController;
use App\Http\Controllers\API\v1\Employee\EmployeeShowController;
use App\Http\Controllers\API\v1\Employee\EmployeeStoreController;
use App\Http\Controllers\API\v1\Employee\EmployeeUpdateController;
use App\Http\Controllers\API\v1\Ingredient\IngredientDeleteController;
use App\Http\Controllers\API\v1\Ingredient\IngredientIndexController;
use App\Http\Controllers\API\v1\Ingredient\IngredientShowController;
use App\Http\Controllers\API\v1\Ingredient\IngredientStoreController;
use App\Http\Controllers\API\v1\Ingredient\IngredientUpdateController;
use App\Http\Controllers\API\v1\LegalDocument\LegalDocumentDeleteController;
use App\Http\Controllers\API\v1\LegalDocument\LegalDocumentDownloadController;
use App\Http\Controllers\API\v1\LegalDocument\LegalDocumentIndexController;
use App\Http\Controllers\API\v1\LegalDocument\LegalDocumentShowController;
use App\Http\Controllers\API\v1\LegalDocument\LegalDocumentStoreController;
use App\Http\Controllers\API\v1\LegalDocument\LegalDocumentUpdateController;
use App\Http\Controllers\API\v1\Order\OrderCanselStatusController;
use App\Http\Controllers\API\v1\Order\OrderIndexController;
use App\Http\Controllers\API\v1\Order\OrderIndexTodayController;
use App\Http\Controllers\API\v1\Order\OrderNextStatusController;
use App\Http\Controllers\API\v1\Order\OrderPreviousStatusController;
use App\Http\Controllers\API\v1\Order\OrderShowController;
use App\Http\Controllers\API\v1\Order\OrderStoreController;
use App\Http\Controllers\API\v1\Product\ProductDeleteController;
use App\Http\Controllers\API\v1\Product\ProductIndexController;
use App\Http\Controllers\API\v1\Product\ProductShowController;
use App\Http\Controllers\API\v1\Product\ProductStoreController;
use App\Http\Controllers\API\v1\Product\ProductUpdateController;
use App\Http\Controllers\API\v1\Product\ProductUpdateStopListController;
use App\Http\Controllers\API\v1\Restaurant\RestaurantDeleteController;
use App\Http\Controllers\API\v1\Restaurant\RestaurantIndexController;
use App\Http\Controllers\API\v1\Restaurant\RestaurantShowController;
use App\Http\Controllers\API\v1\Restaurant\RestaurantStoreController;
use App\Http\Controllers\API\v1\Restaurant\RestaurantUpdateController;
use App\Http\Controllers\API\v1\Role\RoleIndexController;
use App\Http\Controllers\API\v1\User\UserAddress\UserAddressDeleteController;
use App\Http\Controllers\API\v1\User\UserAddress\UserAddressIndexController;
use App\Http\Controllers\API\v1\User\UserAddress\UserAddressShowController;
use App\Http\Controllers\API\v1\User\UserAddress\UserAddressStoreController;
use App\Http\Controllers\API\v1\User\UserAddress\UserAddressUpdateController;
use App\Http\Controllers\API\v1\User\UserOrder\UserActiveOrderIndexController;
use App\Http\Controllers\API\v1\User\UserOrder\UserLastOrderShowController;
use App\Http\Controllers\API\v1\User\UserOrder\UserOrderIndexController;
use App\Http\Controllers\API\v1\User\UserUpdateController;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Employee;
use App\Models\Ingredient;
use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function () {

    Route::get('/get-auth-user', GetAuthUserController::class);

    Route::get('/roles', RoleIndexController::class);

    Route::middleware('auth:sanctum')->group(function () {

        //добавить политику безопасности

//        Route::get('/users', UserIndexController::class);
//        Route::get('/users/{user}', UserShowController::class);
//
//        Route::post('/users', UserStoreController::class);
        Route::patch('/users/{user}', UserUpdateController::class);
//        Route::delete('/users/{user}', UserDeleteController::class);

//        Route::get('/orders', UserIndexController::class);
        Route::get('/orders/today/{restaurantID?}', OrderIndexTodayController::class);
        Route::get('/orders/{order}', OrderShowController::class);

        Route::post('/orders', OrderStoreController::class);
        Route::patch('/orders/{order}/next-status', OrderNextStatusController::class);
        Route::patch('/orders/{order}/previous-status', OrderPreviousStatusController::class);
        Route::patch('/orders/{order}/cansel-status', OrderCanselStatusController::class);
//        Route::patch('/orders/{order}', OrderUpdateController::class);
//        Route::delete('/orders/{order}', OrderDeleteController::class);


//        Route::get('/users/{user}/orders', OrderIndexController::class);
//        Route::get('/users/{user}/orders/{order}', OrderShowController::class);
//
//        Route::post('/users/{user}/orders', OrderStoreController::class);


        //добавить политику безопасности
        Route::get('/users/{user}/addresses', UserAddressIndexController::class);
        Route::get('/users/{user}/addresses/{address}', UserAddressShowController::class);

        Route::post('/users/{user}/addresses', UserAddressStoreController::class);
        Route::patch('/users/{user}/addresses/{address}', UserAddressUpdateController::class);
        Route::delete('/users/{user}/addresses/{address}', UserAddressDeleteController::class);


        Route::get('/users/{user}/orders', UserOrderIndexController::class);
        Route::get('/users/{user}/active-orders', UserActiveOrderIndexController::class);
        Route::get('/users/{user}/last-order', UserLastOrderShowController::class);
    });

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/employees', EmployeeIndexController::class)->can('viewAll', Employee::class);
        Route::get('/employees/{employee}', EmployeeShowController::class)->can('viewOne', 'employee');

        Route::post('/employees', EmployeeStoreController::class)->can('create', Employee::class);
        Route::patch('/employees/{employee}', EmployeeUpdateController::class)->can('update', 'employee');
        Route::delete('/employees/{employee}', EmployeeDeleteController::class)->can('delete', 'employee');
    });

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

        //добавить политику безопасности
        Route::patch('/products/{product}/stop-list', ProductUpdateStopListController::class);
    });

    Route::get('/ingredients', IngredientIndexController::class);
    Route::get('/ingredients/{ingredient}', IngredientShowController::class);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/ingredients', IngredientStoreController::class)->can('create', Ingredient::class);
        Route::patch('/ingredients/{ingredient}', IngredientUpdateController::class)->can('update', 'ingredient');
        Route::delete('/ingredients/{ingredient}', IngredientDeleteController::class)->can('delete', 'ingredient');
    });


    Route::get('/legal-documents', LegalDocumentIndexController::class);
    Route::get('/legal-documents/{legalDocument}', LegalDocumentShowController::class);

    //добавить политику безопасности к правовым документам
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/legal-documents', LegalDocumentStoreController::class);
        Route::patch('/legal-documents/{legalDocument}', LegalDocumentUpdateController::class);
        Route::delete('/legal-documents/{legalDocument}', LegalDocumentDeleteController::class);
    });

    //добавил для загрузки политики т.к. ссылка напрямую из фронтенда вызывает ошибку CORS - START
    Route::get('/legal-documents/download/{legalDocument}', LegalDocumentDownloadController::class);
    //добавил для загрузки политики т.к. ссылка напрямую из фронтенда вызывает ошибку CORS - END


    Route::get('/designs', DesignIndexController::class);
    Route::get('/designs/{design}', DesignShowController::class);

    //добавить политику безопасности к дизайну
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/designs', DesignStoreController::class);
        Route::patch('/designs/{design}', DesignUpdateController::class);
        Route::delete('/designs/{design}', DesignDeleteController::class);
    });

    Route::get('/get-active-design', GetActiveDesignController::class);
});

