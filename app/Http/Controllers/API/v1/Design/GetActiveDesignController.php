<?php

namespace App\Http\Controllers\API\v1\Design;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\v1\Design\DesignResource;
use App\Models\Design;

class GetActiveDesignController extends Controller
{
    public function __invoke()
    {
        $design = Design::where('is_active', true)->first();

        if (!$design) {
            return response()->json(['message' => 'No active design found'], 404);
        }

        return new DesignResource($design);
    }
}
