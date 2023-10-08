<?php

namespace App\Http\Controllers\API\v1\Country;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\v1\Country\CountryResource;
use App\Models\Country;

class IndexController extends Controller
{
    public function __invoke()
    {
        $countries = Country::query()->with('cities')->get();

        return CountryResource::collection($countries);
    }
}
