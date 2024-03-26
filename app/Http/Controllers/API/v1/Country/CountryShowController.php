<?php

namespace App\Http\Controllers\API\v1\Country;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\v1\Country\CountryResource;
use App\Models\Country;

class CountryShowController extends Controller
{
    public function __invoke(Country $country)
    {
        return new CountryResource($country);
    }
}
