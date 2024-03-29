<?php

namespace App\Http\Controllers\API\v1\Country;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\v1\Country\CountryUpdateRequest;
use App\Http\Resources\API\v1\Country\CountryResource;
use App\Models\Country;

class CountryUpdateController extends Controller
{
    public function __invoke(CountryUpdateRequest $request, Country $country)
    {
        $data = $request->validated();

        $country->update($data);

        return new CountryResource($country);
    }
}
