<?php

namespace App\Http\Controllers\API\v1\City;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\v1\City\CityResource;
use App\Models\City;

class CityShowController extends Controller
{
    public function __invoke(City $city)
    {
        return new CityResource($city);
    }
}
