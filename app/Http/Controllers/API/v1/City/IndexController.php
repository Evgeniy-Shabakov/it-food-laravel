<?php

namespace App\Http\Controllers\API\v1\City;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\v1\City\CityResource;
use App\Models\City;

class IndexController extends Controller
{
    public function __invoke()
    {
        $cities = City::query()->with('restaurants')->get();

        return CityResource::collection($cities);
    }
}
