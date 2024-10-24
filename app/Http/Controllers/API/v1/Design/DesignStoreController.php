<?php

namespace App\Http\Controllers\API\v1\Design;

use App\Http\Controllers\Controller;

use App\Http\Requests\API\v1\Design\DesignStoreRequest;
use App\Http\Resources\API\v1\Design\DesignResource;
use App\Models\Design;

class DesignStoreController extends Controller
{
    public function __invoke(DesignStoreRequest $request)
    {
        $data = $request->validated();

        $design = Design::create($data);

        return new DesignResource($design);
    }
}
