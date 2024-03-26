<?php

namespace App\Http\Controllers\API\v1\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\v1\Category\StoreRequest;
use App\Http\Resources\API\v1\Category\CategoryResource;
use App\Models\Category;

class CategoryStoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $maxNumberInList = Category::all()->max('number_in_list');
        $data['number_in_list'] = $maxNumberInList + 1;

        $category = Category::create($data);

        return new CategoryResource($category);
    }
}
