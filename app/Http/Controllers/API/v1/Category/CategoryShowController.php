<?php

namespace App\Http\Controllers\API\v1\Category;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\v1\Category\CategoryResource;
use App\Models\Category;

class CategoryShowController extends Controller
{
    public function __invoke(Category $category)
    {
        return new CategoryResource($category);
    }
}
