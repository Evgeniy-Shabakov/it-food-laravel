<?php

namespace App\Http\Controllers\API\v1\Ingredient;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\v1\Ingredient\IngredientStoreRequest;
use App\Http\Resources\API\v1\Ingredient\IngredientResource;
use App\Models\Ingredient;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class IngredientStoreController extends Controller
{
    public function __invoke(IngredientStoreRequest $request)
    {
        $data = $request->validated();

        try {
            DB::beginTransaction();

            $imageFile = $data['image_file'];
            unset($data['image_file']);

            $imageFileName = $data['title'] . '.' . $imageFile->getClientOriginalExtension();
            $imageFilePath = Storage::disk('public')->putFileAs('/images/ingredients', $imageFile, $imageFileName);
            $imageFileUrl = url('/storage/' . $imageFilePath) . '?v=' . time();

            $data['image_path'] = $imageFilePath;
            $data['image_url'] = $imageFileUrl;

            if(isset($data['ingredient_ids']))
            {
                $ingredientIds = ($data['ingredient_ids']);
                unset($data['ingredient_ids']);
            }

            $ingredient = Ingredient::create($data);

            if(isset($ingredientIds))
            {
                $ingredient->replacements()->attach($ingredientIds);
            }

            DB::commit();
        }
        catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }

        return new IngredientResource($ingredient);
    }
}
