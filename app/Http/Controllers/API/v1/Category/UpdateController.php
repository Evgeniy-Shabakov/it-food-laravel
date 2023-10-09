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

        if(isset($data['number_in_list'])){
            $maxNumberInList = Category::all()->max('number_in_list');
            if($data['number_in_list'] < 1 || $data['number_in_list'] > $maxNumberInList) return new CategoryResource($category);

            $categoryToReplace = Category::where('number_in_list', $data['number_in_list']);
            if($data['number_in_list'] < $category->number_in_list) {
                $categoryToReplace->update(['number_in_list' => $data['number_in_list'] + 1]);
            }
            else {
                $categoryToReplace->update(['number_in_list' => $data['number_in_list'] - 1]);
            }
        }

        $category->update($data);

        return new CategoryResource($category);
    }
}
