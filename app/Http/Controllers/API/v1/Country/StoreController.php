<?php

namespace App\Http\Controllers\API\v1\Country;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\v1\Country\StoreRequest;
use App\Http\Resources\API\v1\Country\CountryResource;
use App\Models\Country;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $country = Country::create($data);

        return new CountryResource($country);
    }
}
