<?php

namespace App\Http\Controllers\API\v1\City;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\v1\City\CityStoreRequest;
use App\Http\Resources\API\v1\City\CityResource;
use App\Models\City;

class CityStoreController extends Controller
{
    public function __invoke(CityStoreRequest $request)
    {
        $data = $request->validated();

        $city = City::create($data);

        return new CityResource($city);
    }
}
