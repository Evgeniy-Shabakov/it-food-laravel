<?php

namespace App\Http\Controllers\API\v1\Country;

use App\Http\Controllers\Controller;
use App\Models\Country;

class CountryDeleteController extends Controller
{
    public function __invoke(Country $country)
    {
        if ($country->cities->count())
            return response('Небходимо сначала удалить города привязанные к стране ', 403);

        $country->delete();
        return 'OK';
    }
}
