<?php

namespace App\Http\Controllers\API\v1\Country;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\v1\Country\UpdateRequest;
use App\Http\Resources\API\v1\Country\CountryResource;
use App\Models\Country;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Country $country)
    {
        $data = $request->validated();

        $country->update($data);

        return new CountryResource($country);
    }
}
