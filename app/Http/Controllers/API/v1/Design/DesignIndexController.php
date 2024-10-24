<?php

namespace App\Http\Controllers\API\v1\Design;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\v1\Design\DesignResource;
use App\Models\Design;

class DesignIndexController extends Controller
{
    public function __invoke()
    {
        $designs = Design::all();

        return DesignResource::collection($designs);
    }
}
