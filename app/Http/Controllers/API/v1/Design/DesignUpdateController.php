<?php

namespace App\Http\Controllers\API\v1\Design;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\v1\Design\DesignUpdateRequest;
use App\Http\Resources\API\v1\Design\DesignResource;
use App\Models\Design;

class DesignUpdateController extends Controller
{
    public function __invoke(DesignUpdateRequest $request, Design $design)
    {
        $data = $request->validated();

        $design->update($data);

        return new DesignResource($design);
    }
}
