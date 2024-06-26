<?php

namespace App\Http\Controllers\API\v1\Category;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\v1\Category\CategoryResource;
use App\Models\Category;

class CategoryIndexController extends Controller
{
    public function __invoke()
    {
        $categories = Category::query()->with('products')->get()->sortBy('number_in_list');

        return CategoryResource::collection($categories);
    }
}
