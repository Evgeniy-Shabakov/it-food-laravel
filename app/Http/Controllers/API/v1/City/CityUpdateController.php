<?php

namespace App\Http\Controllers\API\v1\City;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\v1\City\UpdateRequest;
use App\Http\Resources\API\v1\City\CityResource;
use App\Models\City;

class CityUpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, City $city)
    {
        $data = $request->validated();

        $city->update($data);

        return new CityResource($city);
    }
}
