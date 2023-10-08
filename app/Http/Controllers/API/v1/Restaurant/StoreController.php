<?php

namespace App\Http\Controllers\API\v1\Restaurant;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\v1\Restaurant\StoreRequest;
use App\Http\Resources\API\v1\Restaurant\RestaurantResource;
use App\Models\Restaurant;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $restaurant = Restaurant::create($data);

        return new RestaurantResource($restaurant);
    }
}
