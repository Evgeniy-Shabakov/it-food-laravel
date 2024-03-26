<?php

namespace App\Http\Controllers\API\v1\Restaurant;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\v1\Restaurant\RestaurantResource;
use App\Models\Restaurant;


class RestaurantShowController extends Controller
{
    public function __invoke(Restaurant $restaurant)
    {
        return new RestaurantResource($restaurant);
    }
}
