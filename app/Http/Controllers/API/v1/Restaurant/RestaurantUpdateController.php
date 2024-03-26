<?php

namespace App\Http\Controllers\API\v1\Restaurant;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\v1\Restaurant\UpdateRequest;
use App\Http\Resources\API\v1\Restaurant\RestaurantResource;
use App\Models\Restaurant;

class RestaurantUpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Restaurant $restaurant)
    {
        $data = $request->validated();

        $restaurant->update($data);

        return new RestaurantResource($restaurant);
    }
}
