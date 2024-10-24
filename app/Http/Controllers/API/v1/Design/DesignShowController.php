<?php

namespace App\Http\Controllers\API\v1\Design;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\v1\Design\DesignResource;
use App\Models\Design;

class DesignShowController extends Controller
{
    public function __invoke(Design $design)
    {
        return new DesignResource($design);
    }
}
