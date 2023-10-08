<?php

namespace App\Http\Controllers\API\v1\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\v1\Category\UpdateRequest;
use App\Http\Resources\API\v1\Category\CategoryResource;
use App\Models\Category;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Category $category)
    {
        $data = $request->validated();

        $category->update($data);

        return new CategoryResource($category);
    }
}
