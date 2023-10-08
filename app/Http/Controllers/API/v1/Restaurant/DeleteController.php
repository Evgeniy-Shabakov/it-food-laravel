<?php

namespace App\Http\Controllers\API\v1\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;

class DeleteController extends Controller
{
    public function __invoke(Restaurant $restaurant)
    {
        $restaurant->delete();
        return 'OK';
    }
}
