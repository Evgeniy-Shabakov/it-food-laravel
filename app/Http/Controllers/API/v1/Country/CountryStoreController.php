<?php

namespace App\Http\Controllers\API\v1\Country;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\v1\Country\CountryStoreRequest;
use App\Http\Resources\API\v1\Country\CountryResource;
use App\Models\Country;

class CountryStoreController extends Controller
{
    public function __invoke(CountryStoreRequest $request)
    {
        $data = $request->validated();

        $country = Country::create($data);

        return new CountryResource($country);
    }
}
