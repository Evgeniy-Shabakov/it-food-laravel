<?php

namespace App\Http\Controllers\API\v1\City;

use App\Http\Controllers\Controller;
use App\Models\City;

class CityDeleteController extends Controller
{
    public function __invoke(City $city)
    {
        if ($city->restaurants->count())
            return response('Небходимо сначала удалить рестораны привязанные к городу ', 405);

        $city->delete();
        return 'OK';
    }
}
